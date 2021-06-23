<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\vente;

use Illuminate\Http\Request;

class venteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventes= vente::all();
        return view('dashboard.vente.index',['ventes'=>$ventes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('dashboard.vente.add',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date_vente' => 'required|string|max:255',
            'user_id' => 'required|max:255',
        ]);
        vente::create([
            'date_vente'=>$request->date_vente,
            'user_id'=>$request->user_id
        ]);
        return redirect('/ventes')->with('added','vente added with success');

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
        $vente =vente::find($id);
        $users =User::all();
        return view('dashboard.vente.update',['users'=>$users,'vente'=>$vente]);
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
        $this->validate($request,[
            'date_vente' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);

        $vente=vente::find($id);
        $vente->date_vente=$request->date_vente;
        $vente->user_id=$request->user_id;
        $vente->save();
        return redirect('ventes')->with('updated','vente updatedwith success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vente= vente::find($id);
        $vente->delete();
        return  redirect('ventes')->with('deleted','deleted with success');
    }
}
