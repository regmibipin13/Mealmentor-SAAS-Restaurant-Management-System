<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoriesController extends Controller
{
    public function index()
    {
        return ItemCategory::all();
    }
}
