<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Commend;
use App\Models\Commend_Element;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $cmd= Commend::all();
        $articles= Article::all();
        $users= User::all();
        $categories= Category::all();
        $total_cmd=0;

        foreach($cmd as $item){
            foreach( $item->commend_elements as $item1){
                $total_cmd += (int)$item1->prix;

            }

        }



        return view('dashboard.dashboard',['cmd'=>$cmd,'categories'=>$categories,'users'=>$users,'total_cmd'=>$total_cmd,'articles'=>$articles]);
    }
    public function index()
    {
        $users =User::all();
        return view('dashboard.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.add');
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
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'action' => 'required|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name'=>$request->name,
            'prenom'=>$request->prenom,
            'tel'=>$request->tel,
            'cin'=>$request->cin,
            'action'=>$request->action,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return redirect('/users')->with('added','added with success');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return  view('dashboard.users.commendes',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('dashboard.users.update',['user'=>$user]);
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
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'action' => 'required|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',

        ]);
        $user =User::find($id);
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->cin=$request->cin;
        $user->action=$request->action;
        $user->tel=$request->tel;
        $user->email=$request->email;
        $user->save();
        return redirect('users')->with('updated','user updated with succsses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
        $user->delete();
        return redirect('users')->with('deleted','article deleted with success');
    }
}
