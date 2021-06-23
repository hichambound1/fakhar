<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vente_Element;
use App\Models\Vente;
use App\Models\Article;

class Vente_ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements_v= Vente_Element::all();
        return view('dashboard.vente_element.index',['elements_v'=>$elements_v]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles =Article::all();
        $ventes=Vente::all();
        return view('dashboard.vente_element.add',['ventes'=>$ventes,'articles'=>$articles]);
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
            'prix' => 'required|max:255',
            'quantitie' => 'required|max:255',
            'vente_id' => 'required|max:255',
            'article_id' => 'required|max:255',
        ]);
        Vente_Element::create([
            'vente_id'=>$request->vente_id,
            'article_id'=>$request->article_id,
            'prix'=>$request->prix,
            'quantitie'=>$request->quantitie,
        ]);
        return redirect('ventes_elements')->with('added','vente added with success');
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
        $articles =Article::all();
        $ventes=Vente::all();
        $element_v=Vente_Element::find($id);

        return view('dashboard.vente_element.update',['element_v'=>$element_v,'ventes'=>$ventes,'articles'=>$articles]);
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
        $element_v=Vente_Element::find($id);
        $element_v->prix=$request->prix;
        $element_v->quantitie=$request->quantitie;
        $element_v->vente_id=$request->vente_id;
        $element_v->article_id=$request->article_id;
        $element_v->save();
        return redirect('ventes_elements')->with('updated','vente elements updatedwith success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element_v=Vente_Element::find($id);
        $element_v->delete();
        return redirect('ventes_elements')->with('deleted','vente elements deleted with success');

    }
}
