<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ItemCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('item_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item_categories = ItemCategory::filters()->paginate(20);
        return view('admin.item-categories.index', compact('item_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('item_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.item-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate(['name' => 'required | unique:item_categories']);
        ItemCategory::create($sanitized);
        return redirect()->to('/admin/item-categories')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCategory $itemCategory)
    {
        abort_if(Gate::denies('item_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.item-categories.edit', compact('itemCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCategory $itemCategory)
    {
        $sanitized = $request->validate(['name' => 'required']);
        $itemCategory->update($sanitized);
        return redirect()->to('/admin/item-categories')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCategory $itemCategory)
    {
        $itemCategory->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
