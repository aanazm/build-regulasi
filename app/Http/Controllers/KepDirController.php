<?php

namespace App\Http\Controllers;

use App\Models\KepDir;
use App\Models\KepDirItem;
use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepDirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = KepDir::with(['KepDirItem', 'Units'])->get();
        $data = KepDir::orderBy('id', 'DESC')->paginate();
        return view('content.keputusan_direktur.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Units::all();

        return view('content.keputusan_direktur.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());       


        $dtkepdir = KepDir::create([
            'numb' => $request->numb,
            'name' => $request->name,
        ]);

        // $dtkepdiritem = $request->all();
        $dtkepdiritem = KepDirItem::create([
            'list_id' => $dtkepdir->id,
            'tgl_tetap' => $request->tgl_tetap,
            'masa_berlaku' => $request->masa_berlaku,
            'tgl_pengesahan' => $request->tgl_pengesahan,
            'file' => $request->file,
        ]);
        
        if (isset($request->file)) {
            $dtkepdiritem['file'] = Storage::disk('public')->put('file', $request->file);
        }

        return redirect()->route('keputusan-direktur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KepDir  $kepDir
     * @return \Illuminate\Http\Response
     */
    public function show(KepDir $kepDir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KepDir  $kepDir
     * @return \Illuminate\Http\Response
     */
    public function edit(KepDir $kepDir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KepDir  $kepDir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KepDir $kepDir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KepDir  $kepDir
     * @return \Illuminate\Http\Response
     */
    public function destroy(KepDir $kepDir)
    {
        //
    }
}
