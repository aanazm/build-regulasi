<?php

namespace App\Http\Controllers;

use App\Models\ItemDocs;
use App\Models\Positions;
use App\Models\RegList;
use App\Models\Units;
use App\Models\RegMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reglist = RegList::where('menu_id', 2)->get();
        $itemDoc = ItemDocs::all();
        $positions = Positions::all();
        $units = Units::all();
        $regmenu = RegMenu::all();

        return view('content.pedoman_Organiasis.index', compact('reglist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Units::all();
        $regmenu = RegMenu::all();

        return view('content.pedoman_Organiasi.create', [
            'unit' => $unit,
            'regmenu' => $regmenu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menus = $request->menu;
        $reglist = RegList::create([
            'name' => $request->name,
            'kd' => $request->kd,
            'menu_id' => $menus
        ]);


        //$educations = $request->sdm_educations;
        $units = $request->unit;
       

        $itemDoc = ItemDocs::create([
            'list_id' => $reglist->id,
            'tgl_tetap' => $request->tgl_tetap,
            'masa_berlaku' => $request->masa_berlaku,
            'tgl_pengesahan' => $request->tgl_pengesahan,
            'unit_id' => $units,
            
        ]);


        return redirect()->route('pedoman-pelayanan.index')
        ->with('success', 'Items created successfully.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
