<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Notifications\AdminAccountInfoNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $all_admin = Admin::latest()->where( 'trash', false )->get();
        $roles     = Role::latest()->get();
        return view( 'admin.pages.user.index', [
            'all_admin' => $all_admin,
            'form_type' => 'create',
            'roles'     => $roles,
        ] );
    }

    /**
     * Trash Users View
     */

    public function trashUsers() {

        $all_admin = Admin::latest()->where( 'trash', true )->get();
        // $roles     = Role::latest()->get();
        return view( 'admin.pages.user.trash', [
            'all_admin' => $all_admin,
            'form_type' => 'trash',
            // 'roles'     => $roles,
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
        $user = Admin::create( [
            'role_id'  => $request->role,
            'name'     => $request->name,
            'email'    => $request->email,
            'cell'     => $request->cell,
            'username' => $request->username,
            'password' => Hash::make( $pass ),
        ] );

        //Mail Notification send with credential
        $user->notify( new AdminAccountInfoNotification( [$user['name'], $pass] ) );

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
        $edit_data = Admin::findOrFail( $id );
        $all_admin = Admin::latest()->where( 'trash', false )->get();
        $roles     = Role::latest()->get();
        return view( 'admin.pages.user.index', [
            'all_admin' => $all_admin,
            'edit_data' => $edit_data,
            'form_type' => 'edit',
            'roles'     => $roles,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //Validation
        $this->validate( $request, [
            'name'     => ['required'],
            'email'    => ['required'],
            'cell'     => ['required'],
            'username' => ['required'],
        ] );

        //User Info update
        $update_data = Admin::findOrFail( $id );
        $update_data->update( [
            'role_id'  => $request->role_id,
            'name'     => $request->name,
            'email'    => $request->email,
            'cell'     => $request->cell,
            'username' => $request->username,
        ] );

        return back()->with( 'success', 'User data updated successfully.' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $delete_data = Admin::findOrFail( $id );
        $delete_data->delete();
        return back()->with( 'success-main', 'User deleted permanently' );
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

    /**
     * Trash Update
     */

    public function updateTrash( $id ) {
        $data = Admin::findOrFail( $id );

        if ( $data->trash ) {
            $data->update( [
                'trash' => false,
            ] );
        } else {
            $data->update( [
                'trash' => true,
            ] );
        }

        return back()->with( 'success-main', 'Trash updated successfully' );

    }

}