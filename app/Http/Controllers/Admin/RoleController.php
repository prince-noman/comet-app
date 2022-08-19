<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $roles       = Role::latest()->get();
        $permissions = Permission::latest()->get();
        return view( 'admin.pages.user.role.index', [
            'roles'       => $roles,
            'permissions' => $permissions,
            'form_type'   => 'create',
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
        //validation
        $this->validate( $request, [
            'name' => ['required'],
        ] );

        //store role
        Role::create( [
            'name'        => $request->name,
            'slug'        => Str::slug( $request->name ),
            'permissions' => json_encode( $request->permission ),
        ] );

        //return back
        return back()->with( 'success', 'Role added successfully' );
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
        $edit        = Role::findOrFail( $id );
        $roles       = Role::latest()->get();
        $permissions = Permission::latest()->get();
        return view( 'admin.pages.user.role.index', [
            'roles'       => $roles,
            'permissions' => $permissions,
            'form_type'   => 'edit',
            'edit'        => $edit,
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

        //validation
        $this->validate( $request, [
            'name'       => ['required'],
            'permission' => ['required'],
        ], [
            'permission.required' => 'You must check at least one permission',
        ] );

        $update_data = Role::findOrFail( $id );
        $update_data->update( [
            'name'        => $request->name,
            'slug'        => Str::slug( $request->name ),
            'permissions' => json_encode( $request->permission ),
        ] );
        return back()->with( 'success', 'Role updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //role delete
        $delete_data = Role::findOrFail( $id );
        $delete_data->delete();
        return back()->with( 'success-main', 'Role deleted successfully' );
    }
}