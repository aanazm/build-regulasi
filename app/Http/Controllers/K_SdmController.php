<?php

namespace App\Http\Controllers;

use App\Models\K_Sdm;
use App\Models\SdmEdu;
use App\Models\Expert_Education;
use App\Models\ExpertLevel;
use Illuminate\Http\Request;

class K_SdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request->all();
        //$data = Items_Equipment::with(['EquipmentType', 'Ownership', 'Condition'])->orderBy('id', 'DESC')->paginate();
        $sdms = K_Sdm::query();
        if ($request->sdm_educations) {
            $sdms->whereHas('SdmEdu', function ($query) use ($request) {
                return $query->whereIn('edu_id', $request->sdm_educations);
            });
        }


        $educations = Expert_Education::all();
        return view('employee.sdm.index', [
            'sdms' => $sdms->get(),
            'educations' => $educations,
            'filters' => $request->sdm_educations ?? []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return $request->all();
        //$data = Items_Equipment::with(['EquipmentType', 'Ownership', 'Condition'])->orderBy('id', 'DESC')->paginate();
        $sdms = K_Sdm::query();
        if ($request->sdm_educations) {
            $sdms->whereHas('SdmEdu', function ($query) use ($request) {
                return $query->whereIn('edu_id', $request->sdm_educations);
            });
        }


        $educations = Expert_Education::all();
        return view('employee.sdm.index', [
            'sdms' => $sdms->get(),
            'educations' => $educations,
            'filters' => $request->sdm_educations ?? []
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

        //return $request->all();
        $sdm = K_Sdm::create([
            'name' => $request->sdm_name,
        ]);

        $educations = $request->sdm_educations;
        foreach ($educations as $index => $educations) {
            SdmEdu::create([
                'sdm_id' => $sdm->id,
                'edu_id' => $educations,
                'name' => $request->name[$index]
            ]);
        }

        return redirect()->route('pegawai-sdm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\K_Sdm  $k_Sdm
     * @return \Illuminate\Http\Response
     */
    public function show(K_Sdm $k_Sdm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\K_Sdm  $k_Sdm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educations = Expert_Education::all();

        $k_sdm = K_Sdm::find($id);
        return view('employee.sdm.edit', [
            'educations' => $educations,
            'sdm' => $k_sdm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\K_Sdm  $k_Sdm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $sdm = K_Sdm::find($id);


        // return $removeSdm;

        //edit
        foreach ($request->sdm_edus as $index => $sdm_edu) {
            SdmEdu::find($sdm_edu)->update([
                'edu_id' => $request->sdm_educations[$index],
                'name' => $request->name[$index],
            ]);
        }

        //remove
        SdmEdu::where('sdm_id', $id)
            ->whereNotIn('edu_id', $request->sdm_educations)
            ->delete();


        //add
        if ($request->new_sdm_educations) {
            foreach ($request->new_sdm_educations as $index => $sdm_education) {
                SdmEdu::create([
                    'sdm_id' => $id,
                    'edu_id' => $sdm_education,
                    'name' => $request->new_name[$index]
                ]);
            }
        }

        return redirect()->route('pegawai-sdm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\K_Sdm  $k_Sdm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        K_Sdm::find($id)->delete();
        //$items_Equipment->delete();
        return redirect()->route('pegawai-sdm.index');
    }
}
