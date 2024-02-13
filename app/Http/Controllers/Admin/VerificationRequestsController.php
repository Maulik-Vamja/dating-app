<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class VerificationRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.verification-request.index')->with(['custom_title' => 'verification request']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.verification-request.create')->with(['custom_title' => 'Faq']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['custom_id'] = get_unique_string('Verification Request');
        $document = Document::create($request->all());
        if ($document) {
            flash('faq created successfully!')->success();
        } else {
            flash('Unable to save faq. Please try again later.')->error();
        }
        return redirect(route('admin.verification-request.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $verification_request)
    {
        return view('admin.pages.verification-request.show', ['document' => $verification_request])->with(['custom_title' => 'document']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {

        return view('admin.pages.verification-request.edit', compact('document'))->with(['custom_title' => 'Faq']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Document $document, Request $request)
    {
        if (!empty($request->action) && $request->action == 'change_status') {
            $content = ['status' => 204, 'message' => "something went wrong"];
            if ($document) {
                $document->is_active = $request->value;
                if ($document->save()) {
                    $content['status'] = 200;
                    $content['message'] = "Faq updated successfully.";
                }
            }
            return response()->json($content);
        } else {
            $document->fill($request->all());
            if ($document->save()) {
                flash('Faq details updated successfully!')->success();
            } else {
                flash('Unable to update faq. Try again later')->error();
            }
            return redirect(route('admin.verification-request.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!empty($request->action) && $request->action == 'delete_all') {
            $content = ['status' => 204, 'message' => "something went wrong"];
            Document::whereIn('custom_id', explode(',', $request->ids))->delete();
            $content['status'] = 200;
            $content['message'] = "faq deleted successfully.";
            $content['count'] = Document::all()->count();
            return response()->json($content);
        } else {
            $document = Document::where('custom_id', $id)->firstOrFail();
            $document->delete();
            if (request()->ajax()) {
                $content = array('status' => 200, 'message' => "faq deleted successfully.", 'count' => Document::all()->count());
                return response()->json($content);
            } else {
                flash('faq deleted successfully.')->success();
                return redirect()->route('admin.verification-request.index');
            }
        }
    }

    /* Listing Details */
    public function listing(Request $request)
    {
        extract($this->DTFilters($request->all()));
        $records = [];
        $documents = Document::orderBy($sort_column, $sort_order);

        if ($search != '') {
            $documents->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                ->orWhereHas('user',function($q) use ($search){
                    $q->where('name', 'like', "%{$search}%");
                });
            });
        }

        $count = $documents->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $documents = $documents->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $documents = $documents->latest()->get();

        foreach ($documents as $document) {
            $params = [
                'checked' => ($document->is_active ? 'checked' : ''),
                'getaction' => $document->is_active,
                'class' => '',
                'id' => $document->custom_id,
            ];

            $records['data'][] = [
                'id' => $document->id,
                'title' => $document->title,
                'type' => $document->type,
                'status' => $document->status,
                'user' => $document->user ? $document->user->full_name : '',
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'Verification Request', 'id' => $document->custom_id], $document)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $document->custom_id)->render(),
                'updated_at' => $document->updated_at,
            ];
        }
        // dd($records);
        return $records;
    }
}
