<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller //ControllerResource
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Session::flash('chave','valor');
        $clients= \App\Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client_type = Client::getClientType($request->client_type);
        return view('admin.clients.create',['client'=> new Client(),'client_type'=>$client_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['defaulter']= $request->has('defaulter');
        $data['client_type'] = Client::getClientType($request->client_type);
        Client::create($data);
        \Session::flash('message','Cliente cadastrado com sucesso!');
        return redirect()->route('clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) //Route Model Binding Implicito
    {
        $client_type = $client->client_type;
        return view ('admin.clients.edit',compact('client','client_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['defaulter']= $request->has('defaulter');
        $client->fill($data);
        $client->save();
        \Session::flash('message','Cliente atualizado com sucesso!');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cliente $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

}
