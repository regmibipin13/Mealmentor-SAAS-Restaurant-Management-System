<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $categories = ItemCategory::pluck('name', 'id');
        return view('frontend.pages.home', compact('categories'));
    }

    public function categories(Request $request)
    {
        $categories = ItemCategory::pluck('name', 'id');
        if ($request->has('category') && $request->category !== null) {
            $items = Item::available()->matchCategory($request)->orderBy('id', 'desc')->get();
        } else {
            $items = Item::available()->orderBy('id', 'desc')->get();
        }
        return view('frontend.pages.categories', compact('items', 'categories'));
    }
}
