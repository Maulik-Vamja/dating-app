<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetaTagController extends Controller
{
    public function index()
    {
        return view('admin.pages.meta-tags.index')->with('custom_title', 'Meta Tag');
    }
}
