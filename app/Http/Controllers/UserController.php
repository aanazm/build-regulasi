<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    // user defined method
    public function profile()
    {
        return view('content.account.profile');
    }

    public function postProfile(Request $request){
        $user = auth()->user();
        $this->validate($request,[
            'name' =>'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            // 
        ]);

        $user->update($request->all());
        // $user = update([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->newpassword)
        // ]);

        return redirect()->back()->with('info', 'Profile Successfull Update');
    }

    public function getPassword(){
        return view('content.account.password');
    }
    
    public function postPassword(Request $request){
        $this->validate($request, [
            'newpassword' => 'required|min:6|max:30|confirmed'
        ]);

        $user = auth()->user();

        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);

        return redirect()->back()->with('success', 'Password has been Changed Successfully');
    }

}
