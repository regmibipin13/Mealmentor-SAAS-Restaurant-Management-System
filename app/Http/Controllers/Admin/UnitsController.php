<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('units_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $units = Unit::filters()->paginate(20);
        return view('admin.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('units_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate(['name' => 'required | unique:units']);
        Unit::create($sanitized);
        return redirect()->to('/admin/units')->with('success', 'unit Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('units_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unit $unit)
    {
        $sanitized = $request->validate(['name' => 'required']);
        $unit->update($sanitized);
        return redirect()->to('/admin/units')->with('success', 'Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->back()->with('success', 'Unit Deleted Successfully');
    }
}
