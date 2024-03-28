<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UnitSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $UnitDatas = Units::orderBy('id', 'DESC')->paginate();
        return view('content.settings.units.index', compact('UnitDatas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.settings.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Units::create($request->all());
    
        return redirect()->route('settings-units.index')
                        ->with('success','Items created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function show(Units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function edit(Units $units, $id)
    {
        $unit = Units::find($id);
        return view('content.settings.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Units $units, $id)
    {
        DB::table('pedoman_pelayanan')->where('id', $id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->route('settings-units.index')
            ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function destroy(Units $units, $id)
    {
        Units::find($id)->delete();
        return redirect()->route('settings-units.index')
            ->with('success', 'Item deleted successfully');
    }
}
