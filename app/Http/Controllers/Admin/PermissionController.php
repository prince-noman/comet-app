<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $permission = Permission::latest()->get();
        return view( 'admin.pages.user.permission.index', [
            'all_permission' => $permission,
            'form_type'      => 'create',
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

        //validtion
        $this->validate( $request, [
            'name' => 'required|unique:permissions',
        ] );

        //data store
        Permission::create( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );
        return back()->with( 'success', 'Permission added successfully' );
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
        $permission = Permission::latest()->get();
        $per        = Permission::findOrFail( $id );
        return view( 'admin.pages.user.permission.index', [
            'all_permission' => $permission,
            'form_type'      => 'edit',
            'edit'           => $per,
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
            'name' => 'required',
        ] );

        //Data Update
        $update_data = Permission::findOrFail( $id );
        $update_data->update( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );
        return back()->with( 'success', 'Permission updated successfully.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $delete = Permission::findOrFail( $id );
        $delete->delete();
        return back()->with( 'success-main', 'Permission deleted successfully' );
    }
}