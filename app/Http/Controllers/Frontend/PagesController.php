<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $restaurants = Restaurant::all();
        return view('frontend.pages.home', compact('restaurants'));
    }

    public function categories(Request $request)
    {
        $categories = ItemCategory::where('restaurant_id', $request->restaurant_id)->pluck('name', 'id');
        if (!$request->has('restaurant_id') || $request->restaurant_id == null) {
            return abort(404);
        }
        if ($request->has('category') && $request->category !== null) {
            $items = Item::available()->matchRestro($request->restaurant_id)->matchCategory($request)->orderBy('id', 'desc')->get();
        } else {
            $items = Item::available()->matchRestro($request->restaurant_id)->orderBy('id', 'desc')->get();
        }
        return view('frontend.pages.categories', compact('items', 'categories'));
    }
}
