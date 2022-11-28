<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class ctrUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view_users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view_register');
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
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required|min:8",
        ]);

        // 1ère methode
        // $requette=User::create([
            
        //     "name"=>$request->name,
        //     "email"=>$request->email,
        //     "password"=>Hash::make($request->password)
        // ]);
        // return redirect(())->back();
        
        //2ème methode 
        $requette= new User;
        $requette->name=$request->name;
        $requette->email=$request->email;
        $requette->password= Hash::make($request->password);
        $requette->save();
               return response()->json(["success"=>200]);
    }

    public function login(Request $request){
        $this->validate($request,[
            "email"=>"required|email",
            "password"=>"required|min:8",
        ]);
        $result= User::Where("email",$request->email)->first();
        if($result && Hash::check($request->password,$result->password)){
            Session::put('user',$result->id);
            return redirect()->route('home');
        }
        else{
            return redirect()->back(); 
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       
    }

    public function list(){
        $users=User::all();
        return view('view_liste',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('view_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            "name"=>"required",
            "email"=>"required|email",
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return response()->json(["success"=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
          return response()->json(["success"=>200]);;
    }
}
