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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function listing(Request $request)
    {
        extract($this->DTFilters($request->all()));
        $records = [];
        $blogs = Blog::orderBy($sort_column, $sort_order);

        if ($search != '') {
            $blogs->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $count = $blogs->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $blogs = $blogs->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $blogs = $blogs->latest()->get();
        foreach ($blogs as $blog) {
            $params = [
                'checked' => ($blog->is_active ? 'checked' : ''),
                'getaction' => $blog->is_active,
                'class' => '',
                'id' => $blog->custom_id,
            ];

            $records['data'][] = [
                'id' => $blog->id,
                'title' => $blog->title,
                'description' => $blog->description,
                'category_name' => $blog->category->name,
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'Faqs', 'id' => $blog->custom_id], $blog)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $blog->custom_id)->render(),
                'updated_at' => $blog->updated_at,
            ];
        }
        // dd($records);
        return $records;
    }
}
