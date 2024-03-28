<?php

namespace App\Http\Controllers;

use App\Models\RegMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $RegDatas = RegMenu::orderBy('id', 'DESC')->paginate();
        return view('content.settings.regs.index', compact('RegDatas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.settings.regs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RegMenu::create($request->all());
    
        return redirect()->route('settings-regs.index')
                        ->with('success','Items created successfully.');
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
        $regs = RegMenu::find($id);
        return view('content.settings.regs.edit', compact('regs'));
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
        DB::table('reg_menu')->where('id', $id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->route('settings-regs.index')
            ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegMenu::find($id)->delete();
        return redirect()->route('settings-regs.index')
            ->with('success', 'Item deleted successfully');
    }
}
