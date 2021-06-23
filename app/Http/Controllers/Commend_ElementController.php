<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commend_Element;

use App\Models\Article;
use App\Models\Commend;

class Commend_ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements_v= Commend_Element::all();
        return view('dashboard.commend_element.index',['elements_v'=>$elements_v]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $articles =Article::all();
        $commend=Commend::find($id);
        return view('dashboard.commend_element.add',['commend'=>$commend,'articles'=>$articles]);
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
            'commend_id' => 'required|max:255',
            'article_id' => 'required|max:255',
        ]);
        Commend_Element::create([
            'commend_id'=>$request->commend_id,
            'article_id'=>$request->article_id,
            'prix'=>$request->prix,
            'quantitie'=>$request->quantitie,
        ]);
        $commend=Commend::find($request->commend_id);
        return view('dashboard.commend.show',['commend'=>$commend])->with('added','commend added with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commend=Commend::find($id);
        return view('dashboard.commend.show',['commend'=>$commend]);
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
        $commends=Commend::all();
        $element_v=Commend_Element::find($id);

        return view('dashboard.commend_element.update',['element_v'=>$element_v,'commends'=>$commends,'articles'=>$articles]);
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
        $element_v=Commend_Element::find($id);
        $element_v->prix=$request->prix;
        $element_v->quantitie=$request->quantitie;
        $element_v->commend_id=$request->commend_id;
        $element_v->article_id=$request->article_id;
        $element_v->save();
        $commend=Commend::find($request->commend_id);
        return view('dashboard.commend.show',['commend'=>$commend])->with('updated','commend elements updatedwith success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $element_v=Commend_Element::find($id);
        $commend=Commend::find($element_v->commend_id);
        $element_v->delete();


        return view('dashboard.commend.show',['commend'=>$commend])->with('deleted','commend elements deleted with success');


    }
}
