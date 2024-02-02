<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Contact;
use Mail;


class Contactcontroller extends Controller
{
    public function store(Request $request){
        $messages = $this->messages();

        $data = $request->validate([
          'first_name'=>'required|string|max:50',
          'last_name'=>'required|string|max:50',
          'email'=> 'required|string',
          'message' => 'required',
         ], $messages);
         Contact::create($data);
         Mail::to('christin@example.com')->send(new ContactMail($data) );
         return redirect('contact')->with('success', 'insert data successsfully');
       }

       public function index(){
        $contacts =Contact::get();
        return view('admin.contact.contacts',compact('contacts'));
            }
            
        
        
         public function show(string $id)
            {
                Contact::where('id', $id)->update(['unread' => 1]);
                $contact= Contact::findOrFail($id);
                return view('admin.contact.showcontact', compact('contact'));
            }
      
            public function destroy(string $id)
            {
                Contact::where('id', $id)->delete();
                return redirect('admin/contact/contacts')->with('success', 'delete message');
            }

            public function messages(){
                return[
                        'first_name.required'=>'title required',
                        'first_name.string'=>'Should be string',
                        'last_name.required'=> 'should be text',
                        'email.required'=> 'should be email',
                        'message.required'=> 'should be text',        
                ];
            }
}
