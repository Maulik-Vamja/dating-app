<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            extract($this->DTFilters($request->all()));
            $records = [];
            $blogs = Blog::query();

            if ($search != '') {
                $blogs->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%");
                });
            }

            $count = $blogs->count();

            $records['recordsTotal'] = $count;
            $records['recordsFiltered'] = $count;
            $records['data'] = [];

            $blogs = $blogs->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order)->latest()->get();

            foreach ($blogs as $blog) {

                $params = [
                    'checked' => ($blog->is_active ? 'checked' : ''),
                    'getaction' => $blog->is_active,
                    'class' => '',
                    'id' => $blog->custom_id,
                ];

                $records['data'][] = [
                    'id' => $blog->id,
                    'title' => str_limit($blog->title, 40),
                    'description' => str_limit($blog->description, 40),
                    'category_name' => $blog->category->name,
                    'is_active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                    'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'Blog', 'id' => $blog->custom_id], $blog)->render(),
                    'updated_at' => $blog->updated_at,
                    'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $blog->custom_id)->render(),
                ];
            }
            return $records;
        }
        return view('admin.pages.blogs.index')->with(['custom_title' => 'Blogs']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['name', 'id']);
        $tags = Tag::get(['name', 'id']);
        return view('admin.pages.blogs.create', ['categories' => $categories, 'tags' => $tags,])->with('custom_title', 'Blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request['custom_id'] = get_unique_string('blogs');
            $request['slug'] = get_unique_slug(str_slug($request->title));
            Blog::create($request->all());
            
            flash('Blog Added Succesfully')->success();
            DB::commit();
        } catch (\Throwable $th) {
            flash('Something went wrong')->error();
            DB::rollback();
        }
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string Blog $blog)
    {
        $blog->load(['category','tags']);
        $categories = Category::get(['name', 'id']);
        $tags = Tag::get(['name', 'id']);
        return view('admin.pages.blogs.edit', ['categories' => $categories, 'tags' => $tags,'blog' => $blog])->with('custom_title', 'Blog');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string Blog $blog)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->action) && $request->action == 'change_status') {
                $content = ['status' => 204, 'message' => "something went wrong"];
                if ($blog) {
                    $blog->is_active = ($request->value) ? StatusEnums::ACTIVE : StatusEnums::INACTIVE;
                    if ($blog->save()) {
                        DB::commit();
                        $content['status'] = 200;
                        $content['message'] = "Status updated successfully.";
                    }
                }
                return response()->json($content);
            } else {
                $path = $blog->image;
                //request has remove_profie_photo then delete user image
                if ($request->has('remove_profie_photo')) {
                    if ($blog->profile_photo) {
                        Storage::delete($blog->profile_photo);
                    }
                    $path = null;
                }


                $path = imageUpload($request, "profile_photo", "users/profile_photo", $path);
                $blog->fill($request->all());
                $blog->image = $path;
                if ($blog->save()) {
                    DB::commit();
                    flash('Escort details updated successfully!')->success();
                } else {
                    flash('Unable to update user. Try again later')->error();
                }
                return redirect(route('admin.escorts.index'));
            }
        } catch (QueryException $e) {
            Log::channel("custom_log")->info($e->getMessage() . $e->getFile() . $e->getLine());
            DB::rollback();
            return redirect()->back()->flash('error', "Something went wrong");
        } catch (Exception $e) {
            Log::channel("custom_log")->info($e->getMessage() . $e->getFile() . $e->getLine());
            return redirect()->back()->with('error', "Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!empty($request->action) && $request->action == 'delete_all') {
            $content = ['status' => 204, 'message' => "something went wrong"];

            $blog_images = Blog::whereIn('custom_id', explode(',', $request->ids))->pluck('image')->toArray();
            foreach ($blog_images as $image) {
                if (!empty($image)) {
                    Storage::delete($image);
                }
            }
            Blog::whereIn('custom_id', explode(',', $request->ids))->delete();
            $content['status'] = 200;
            $content['message'] = "Blog deleted successfully.";
            $content['count'] = Blog::all()->count();
            return response()->json($content);
        } else {
            $blog = Blog::where('custom_id', $id)->firstOrFail();
            if ($blog->image) {
                Storage::delete($blog->image);
            }
            $blog->delete();
            if (request()->ajax()) {
                $content = array('status' => 200, 'message' => "Blog deleted successfully.", 'count' => Blog::all()->count());
                return response()->json($content);
            } else {
                flash('Blog deleted successfully.')->success();
                return redirect()->route('admin.blogs.index');
            }
        }
    }

    // public function listing(Request $request)
    // {
    //     extract($this->DTFilters($request->all()));
    //     $records = [];
    //     $blogs = Blog::orderBy($sort_column, $sort_order);

    //     if ($search != '') {
    //         $blogs->where(function ($query) use ($search) {
    //             $query->where('title', 'like', "%{$search}%")
    //                 ->orWhere('description', 'like', "%{$search}%");
    //         });
    //     }

    //     $count = $blogs->count();

    //     $records['recordsTotal'] = $count;
    //     $records['recordsFiltered'] = $count;
    //     $records['data'] = [];

    //     $blogs = $blogs->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

    //     $blogs = $blogs->latest()->get();
    //     foreach ($blogs as $blog) {
    //         $params = [
    //             'checked' => ($blog->is_active ? 'checked' : ''),
    //             'getaction' => $blog->is_active,
    //             'class' => '',
    //             'id' => $blog->custom_id,
    //         ];

    //         $records['data'][] = [
    //             'id' => $blog->id,
    //             'title' => $blog->title,
    //             'description' => $blog->description,
    //             'category_name' => $blog->category->name,
    //             'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
    //             'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'Faqs', 'id' => $blog->custom_id], $blog)->render(),
    //             'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $blog->custom_id)->render(),
    //             'updated_at' => $blog->updated_at,
    //         ];
    //     }
    //     // dd($records);
    //     return $records;
    // }
}
