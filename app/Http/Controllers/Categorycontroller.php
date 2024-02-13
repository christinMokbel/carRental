<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Categorycontroller extends Controller
{
    public function index(){
        $categories =Category::get();
        return view('admin.category.categories',compact('categories'));
            }
        
        public function create()
            {
                return view('admin.category.addcategory');
            }
        
        
        public function store(Request $request)
            {
        $messages = $this->messages();
                $data = $request ->validate ([
                    'category'=>'required|string|max:50',
                ], $messages);
                
                Category::create($data);
                return redirect('admin/category/categories')->with('message', 'insert successfuly');
            }
        
         
        
        public function edit(string $id)
            {
                $category=Category::findOrFail($id);
                return view('admin.category.editcategory', compact('category'));
        }
        public function update(Request $request, string $id)
            {
         $messages = $this->messages();
                $data = $request->validate([
                     'category'=>'required|string|max:50',  
                    ], $messages);
        
                    Category::where('id', $id)->update($data);
                    return redirect('admin/category/categories')->with('message', 'update successfuly');
         }
            public function destroy(string $id)
            {
                Category::where('id', $id)->delete();
                return redirect('admin/category/categories')->with('message', 'delete successfuly');
            }
           
        
        
            public function messages(){
                return[
                        'category.required'=>' required name',
                        'category.string'=>'Should be string',
                ];
            }
}
