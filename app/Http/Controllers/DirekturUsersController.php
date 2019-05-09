<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Datatables;
use DB;

class DirekturUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('direktur.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('direktur.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $user = User::findOrFail($id);
        
        $request['foto'] = $request->get('foto') ? $request->get('foto') : '/images/user-icon.png';
        $request['password'] = $request->get('password') ? bcrypt($request->get('password')) : $user->password;

        $user->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function dataTable(){

        $users = DB::table('users')->where('id', '!=', 1)->get();

        return datatables()->of($users)
            ->addColumn('action', function ($users){
                return 
                '<a href="'. route('direktur.users.show', $users->id) .'" class="btn btn-sm btn-outline-info" style="padding-bottom: 0px; padding-top: 0px;">Tampilkan
                <span class="btn-label btn-label-right"><i class="fa fa-eye"></i></span></a>';
            })
            ->rawColumns(['user', 'action'])
            ->make(true);
    }
}
