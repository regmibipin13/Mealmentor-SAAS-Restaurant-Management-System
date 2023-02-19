<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Items\StoreItemRequest;
use App\Http\Requests\Admin\Items\UpdateItemRequest;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('item_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::with(['item_category', 'unit'])->filters()->paginate(20);
        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        return view('admin.items.index', compact('items', 'itemCategories', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('item_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        return view('admin.items.create', compact('itemCategories', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $sanitized = $this->checkForBools($request->validated());

        $item = Item::create($sanitized);
        $item->addMedia($sanitized['photo'])->toMediaCollection();
        $item->photo = $item->media()->latest()->first()->getUrl();
        $item->save();

        return redirect()->to('/admin/items')->with('success', 'Items Added Successfully');
    }


    public function checkForBools($sanitized)
    {
        if (isset($sanitized['enabled']) && $sanitized['enabled'] == "on") {
            $sanitized['enabled'] = 1;
        } else {
            $sanitized['enabled'] = 0;
        }
        if (isset($sanitized['out_of_stock']) && $sanitized['out_of_stock'] == "on") {
            $sanitized['out_of_stock'] = 1;
        } else {
            $sanitized['out_of_stock'] = 0;
        }
        return $sanitized;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // abort_if(Gate::denies('item_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item->load(['item_category', 'unit']);
        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        return view('admin.items.edit', compact('itemCategories', 'units', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $sanitized = $this->checkForBools($request->all());
        $item->update($sanitized);
        if ($request->has('photo') && $request->file('photo') !== null) {
            $item->clearMediaCollection();
            $item->addMedia($sanitized['photo'])->toMediaCollection('item_photos');
            $item->photo = $item->media()->latest()->first()->getUrl();
            $item->save();
        }

        return redirect()->to('/admin/items')->with('success', 'Items Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->clearMediaCollection();
        $item->delete();
        return redirect()->back()->with('success', 'Item Deleted Successfully');
    }
}
