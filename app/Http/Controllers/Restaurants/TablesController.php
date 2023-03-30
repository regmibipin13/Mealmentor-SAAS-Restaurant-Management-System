<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('tables_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tables = Table::filters()->paginate(20);
        return view('restaurants.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('tables_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('restaurants.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate(['name' => 'required | unique:tables']);
        Table::create($sanitized);
        return redirect()->route('restaurants.tables.index', [currentRestaurant()->slug ?? uniqid()])->with('success', 'Table Created Successfully');
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
    public function edit(Table $table)
    {
        abort_if(Gate::denies('tables_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('restaurants.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $sanitized = $request->validate(['name' => 'required']);
        $table->update($sanitized);
        return redirect()->route('restaurants.tables.index', [currentRestaurant()->slug ?? uniqid()])->with('success', 'Table Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->back()->with('success', 'Table Deleted Successfully');
    }
}
