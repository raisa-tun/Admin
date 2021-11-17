<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $server_list = Server::paginate(3);
        //dd($server_list);
        $count = $server_list->perPage()* ($server_list->currentPage()-1);

        return view('server.list',compact('server_list','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('server.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([

            'IP' =>'required|ip',
            'server_name' => 'required|string|min:3'
        ]);

        $server = Server::create([
          
            'IP' =>$request->ip,
            'server_name' => $request->servername

        ]);
        
        return redirect('/servers');
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
        $find_server_id = Server::find($id);
        //dd($find_id);
        return view('server.edit',compact('find_server_id'));
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
        $request->validate([

            'IP' =>'required|ip',
            'server_name' => 'required|string|min:3'
        ]);
          $server = Server::where('id',$id)->update([
              'IP' => $request->ip,
              'server_name' => $request->servername
          ]);

          return redirect('/servers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find_server_id = Server::find($id);
        $find_server_id->delete();
        return redirect('/servers');
    }
}