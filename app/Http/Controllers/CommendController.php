<?php

namespace App\Http\Controllers;

use App\Models\Commend;
use App\Models\User;
use Illuminate\Http\Request;

class CommendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commends= Commend::all();
        return view('dashboard.commend.index',['commends'=>$commends]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('dashboard.commend.add',['users'=>$users]);
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
            'date_cmd' => 'required|string|max:255',
            'user_id' => 'required|max:255',
        ]);
        Commend::create([
            'date_cmd'=>$request->date_cmd,
            'user_id'=>$request->user_id
        ]);
        return redirect('/commends')->with('added','commend added with success');

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
        $commend =Commend::find($id);
        $users =User::all();
        return view('dashboard.commend.update',['users'=>$users,'commend'=>$commend]);
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
            'date_cmd' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);

        $commend=Commend::find($id);
        $commend->date_cmd=$request->date_cmd;
        $commend->user_id=$request->user_id;
        $commend->save();
        return redirect('commends')->with('updated','commend updatedwith success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commend= Commend::find($id);
        $commend->delete();
        return  redirect('commends')->with('deleted','deleted with success');
    }
    public function add_new($id)
    {

        return view('dashboard.users.new',['id'=>$id]);
    }
    public function store_new(Request $request)
    {

        $this->validate($request,[
            'date_cmd' => 'required|string|max:255',
            'user_id' => 'required|max:255',
        ]);
        Commend::create([
            'date_cmd'=>$request->date_cmd,
            'user_id'=>$request->user_id
        ]);
        $user= User::find($request->user_id);
        return view('dashboard.users.commendes',['user'=>$user])->with('added','commend added with success');
    }
    public function edit_cmd($id)
    {

        $commend =Commend::find($id);
        $id=$commend->user->id;
        return view('dashboard.users.update_cmd',['id'=>$id,'commend'=>$commend]);

    }
    public function update_cmd(Request $request, $id)
    {
        $this->validate($request,[
            'date_cmd' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);

        $commend=Commend::find($id);
        $commend->date_cmd=$request->date_cmd;
        $commend->user_id=$request->user_id;
        $commend->save();
        $user= User::find($request->user_id);
        return view('dashboard.users.commendes',['user'=>$user])->with('updated','commend updatedwith success');
    }
    public function delete($id)
    {

        $commend= Commend::find($id);
        $commend->delete();
        $user= User::find($commend->user_id);
        return view('dashboard.users.commendes',['user'=>$user])->with('deleted','deleted with success');
    }
}
