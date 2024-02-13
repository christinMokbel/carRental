<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class Usercontroller extends Controller
{ 
    public function index(){
    $users = User::get();
    return view('admin.user.users',compact('users'));
        }
    
    public function create()
        {
            return view('admin.user.adduser');
        }
    
    
    public function store(Request $request)
        {
    $messages = $this->messages();
            $data = $request ->validate ([
                'name'=>'required|string|max:50',
                'email'=>'required|string',
                'email_verified_at' =>'date',
                'password'=>'required|string',
                'username'=>'required|string',

            ], $messages);
            
            $data['active']=isset($request->active);
            User::create($data);
            return redirect('admin/user/users')->with('message', 'insert successfuly');
        }
    
     
    
    public function edit(string $id)
        {
            $user=User::findOrFail($id);
            return view('admin.user.edituser', compact('user'));
        }
    public function update(Request $request, string $id)
        {
     $messages = $this->messages();
            $data = $request->validate([
                'name'=>'required|string|max:50',
                'email'=>'required|string',
                'email_verified_at' =>'date',

                'password'=>'required|string',
                'username'=>'required|string',
                ], $messages);
                
                $data['active'] = isset($request->active);
                User::where('id', $id)->update($data);
                return redirect('admin/user/users')->with('message', 'update successfuly');
     }
        public function destroy(string $id)
        {
            User::where('id', $id)->delete();
            return redirect('admin/user/users')->with('message', 'delete successfuly');
        }
       
    
    
        public function messages(){
            return[
                    'name.required'=>' required name',
                    'name.string'=>'Should be string',
                    'email.required'=> 'should be email',
                    'username.required'=>' required username',
                    'password.required'=>' required password',

            ];
        }
    
}
