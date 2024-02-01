<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;

class Testimonialcontroller extends Controller
{
    use Common;
    public function index(){
        $testimonials =Testimonial::get();
        return view('admin.testimonial.testimonials',compact('testimonials'));
            }
        
        public function create()
            {
                return view('admin.testimonial.addtestimonial');
            }
        
        
        public function store(Request $request)
            {
        $messages = $this->messages();
                $data = $request ->validate ([
                    'name'=>'required|string|max:50',
                    'position'=>'required|string',
                    'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                    'content' =>'required|string',
        
                ], $messages);
                $fileName = $this->uploadFile($request->image, 'assets/front/images');
                $data['image'] = $fileName;
                $data['published']=isset($request->published);
                Testimonial::create($data);
                return redirect('admin/testimonial/testimonials')->with('success', 'insert successfuly');
            }
        
         
        
        public function edit(string $id)
            {
                $testimonial=Testimonial::findOrFail($id);
                return view('admin.testimonial.edittestimonial', compact('testimonial'));
        }
        public function update(Request $request, string $id)
            {
         $messages = $this->messages();
                $data = $request->validate([
                     'name'=>'required|string|max:50',
                     'position'=> 'required|string',
                     'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
                     'content'=>'required',
                    ], $messages);
        
                    if($request->hasFile('image')){
                        $fileName = $this->uploadFile($request->image, 'assets/front/images');    
                        $data['image'] = $fileName;
                    }
                    
                    $data['published'] = isset($request->published);
                    Testimonial::where('id', $id)->update($data);
                    return redirect('admin/testimonial/testimonials')->with('update', 'update successfuly');
         }
            public function destroy(string $id)
            {
                Testimonial::where('id', $id)->delete();
                return redirect('admin/testimonial/testimonials')->with('delete', 'delete successfuly');
            }
           
        
        
            public function messages(){
                return[
                        'name.required'=>' required name',
                        'name.string'=>'Should be string',
                        'position.required'=> 'should be text',
                        'image.required'=> 'Please be sure to select an image',
                        'image.mimes'=> 'Incorrect image type',
                        'image.max'=> 'Max file size exceeded',
                        'content.required'=>' required name',
                ];
            } 
}
