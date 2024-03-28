<?php

namespace App\Http\Controllers;


use App\Models\ItemDocs;
use App\Models\Positions;
use App\Models\RegList;
use App\Models\Units;
use App\Models\RegMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reglist = RegList::with(['ItemDocs'])
        ->where('menu_id', 1)
        ->get();
        
        $itemdoc = ItemDocs::all();

        return view('content.pedoman_pelayanan.index', compact(['reglist','itemdoc']));
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

        return view('content.pedoman_pelayanan.create', [
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
        // PedPelayanan::create($request->all());

        // return redirect()->route('pedoman-pelayanan.index')
        //     ->with('success', 'Items created successfully.');

        //dd($request->all());

        //return $request->all();
        $menus = $request->menu;
        $reglist = RegList::create([
            'name' => $request->name,
            'kd' => $request->kd,
            'menu_id' => $menus
        ]);

        $itemdoc = $request->all();
        foreach ($itemdoc as $index => $itemdoc) {
            ItemDocs::create([
                'list_id' => $reglist->id,
                'name' => $request->name,
                'tgl_tetap' => $request->tgl_tetap,
                'file_doc' => $request->file_doc, 
                'tgl_pengesahan' => $request->tgl_pengesahan, 
                'masa_berlaku'=> $request->masa_berlaku
            ]);
        }
        
        //$educations = $request->sdm_educations;
        $units = $request->unit;
        // $itemDoc = ItemDocs::create([
        //     'list_id' => $reglist->id,
        //     'tgl_tetap' => $request->tgl_tetap,
        //     'masa_berlaku' => $request->masa_berlaku,
        //     'tgl_pengesahan' => $request->tgl_pengesahan,
        //     'unit_id' => $units,
            
        // ]);


        return redirect()->route('pedoman-pelayanan.index')
        ->with('success', 'Items created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedPelayanan  $pedPelayanan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedPelayanan  $pedPelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemdocs = ItemDocs::all();

        $reglist = RegList::find($id);
        return view('content.pedoman_pelayanan.edit', [
            'itemdocs' => $itemdocs,
            'regList' => $reglist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PedPelayanan  $pedPelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedPelayanan  $pedPelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegList::find($id)->delete();
        //$items_Equipment->delete();
        return redirect()->route('pedoman-pelayanan.index');
    }
}
