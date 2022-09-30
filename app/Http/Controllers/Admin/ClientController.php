<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClientController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $clients = Client::latest()->get();
        return view( 'admin.pages.client.index', [
            'clients'   => $clients,
            'form_type' => 'create',
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
        //validate
        $this->validate( $request, [
            'name' => ['required'],
            'logo' => ['required'],
        ] );

//client logo image manage
        if ( $request->hasFile( 'logo' ) ) {
            $img       = $request->file( 'logo' );
            $file_name = md5( time() . rand() ) . '.' . $img->clientExtension();

            $image = Image::make( $img->getRealPath() );
            $image->save( storage_path( 'app/public/clients/' . $file_name ) );

        }

        //data store
        Client::create( [
            'name' => $request->name,
            'logo' => $file_name,
        ] );

        return back()->with( 'success', 'Client added successfull' );

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

        $edit_data = Client::findOrFail( $id );
        $clients   = Client::latest()->where( 'trash', false )->get();
        return view( 'admin.pages.client.index', [
            'clients'   => $clients,
            'edit_data' => $edit_data,
            'form_type' => 'edit',
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
        //Get Clint
        $client = Client::findOrFail( $id );

//client logo image manage
        if ( $request->hasFile( 'logo' ) ) {
            $img       = $request->file( 'logo' );
            $file_name = md5( time() . rand() ) . '.' . $img->clientExtension();

            $image = Image::make( $img->getRealPath() );
            $image->save( storage_path( 'app/public/clients/' . $file_name ) );

        }

        //Update Client
        $client->update( [
            'name' => $request->name,
            'logo' => $file_name,
        ] );

        //return back
        return back()->with( 'success', 'Client updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $delete_data = Client::findOrFail( $id );
        $delete_data->delete();
        return back()->with( 'success-main', 'Client deleted permanently' );
    }

}