<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charges = Charge::all();
        return view('dashboard.charges.index',['charges'=>$charges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.charges.add');
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'prix' => 'required|max:255',
        ]);

        Charge::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'prix'=>$request->prix,

        ]);
        return redirect('/charges')->with('added','added avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show(Charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit(Charge $charge)
    {
        return view('dashboard.charges.update',['charge'=>$charge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'prix' => 'required|max:255',
        ]);

        $charge= Charge::find($id);


        $charge->name=$request->name;
        $charge->prix=$request->prix;
        $charge->description=$request->description;

        $charge->save();
        return redirect()->route('charges.index')->with('updated','updated avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charge = Charge::find($id);
        $charge->delete();

        return redirect('/charges')->with('deleted','supprimer avec succes');
    }
}
