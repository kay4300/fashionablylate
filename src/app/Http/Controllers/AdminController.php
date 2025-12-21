<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::paginate(7);

        return view('admin', compact('categories', 'contacts'));
    }

    public function search()
    {
        $search = request()->input ('search');
        $categories = Category::all();
        $contacts = Contact::where('name', 'like', "%{$search}%")
            ->orwhere('email', 'like', "%{$search}%")
            ->orwhere('gender', 'like', "%{$search}%")
            ->orwhere('category_id', 'like', "%{$search}%");

        return view('admin', compact('categories', 'contacts'));
    }

}
