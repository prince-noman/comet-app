<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $all_admin = Admin::latest()->get();
        $roles     = Role::latest()->get();
        return view( 'admin.pages.user.index', [
            'all_admin' => $all_admin,
            'form_type' => 'create',
            'roles'     => $roles,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        //Validation
        $this->validate( $request, [
            'name'     => ['required'],
            'email'    => ['required', 'unique:admins'],
            'cell'     => ['required', 'unique:admins'],
            'username' => ['required', 'unique:admins'],
        ] );

        //Password
        $pass_string = str_shuffle( 'qwertyuiopasdfghjklzxcvbnm1234567890!@#$%&' );
        $pass        = substr( $pass_string, 10, 10 );

        //admin user data store
        Admin::create( [
            'name'     => $request->name,
            'email'    => $request->email,
            'cell'     => $request->cell,
            'username' => $request->username,
            'password' => Hash::make( $pass ),
        ] );

        return back()->with( 'success', 'Admin user created successful' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }

    /**
     * Status Update
     */

    public function updateStatus( $id ) {
        $data = Admin::findOrFail( $id );

        if ( $data->status ) {
            $data->update( [
                'status' => false,
            ] );
        } else {
            $data->update( [
                'status' => true,
            ] );
        }

        return back()->with( 'success-main', 'Status updated successfully' );

    }

}