<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;

use App\Traits\Common;

class Carcontroller extends Controller
{
    use Common;
    
    public function index()
    {
        $cars =Car::get();
        return view('admin.car.cars',compact('cars'));
    }

    
    public function create()
    {
        
       $categories=Category::get();
       return view('admin.car.addCar', compact('categories'));

    }

    
    public function store(Request $request)
    {
        

        
            $messages = $this->messages();
        
        $data = $request ->validate ([
            'title'=>'required|string|max:100',
            'content'=>'required|string',
            'luggage'=>'required|integer',
            'door'=>'required|integer',
            'passenger'=>'required|integer',
            'price'=>'required|integer',

            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' =>'required|string',

        ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/front/images');
        $data['image'] = $fileName;
        $data['active']=isset($request->active);
        Car::create($data);
        return redirect('admin/car/cars')->with('success','insert data successfully');


    }

    public function edit(string $id)
    {
        
        $car = Car::findOrFail($id);
        $categories = Category::get();
        return view('admin.car.editCar', compact('car','categories'));
    }

   
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:100',
             'content'=> 'required|string',
             'luggage'=>'required|integer',
             'door'=>'required|integer',
             'passenger'=>'required|integer',
             'price'=>'required|integer',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
             'category_id'=>'required',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/front/images');    
                $data['image'] = $fileName;
            }
            
            $data['active'] = isset($request->active);
            Car::where('id', $id)->update($data);
            return redirect('admin/car/cars')->with('sucess','update successfully');

    }

    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('admin/car/cars')->with('success','delete successfully');
    }
   
    public function messages(){
        return[
                'title.required'=>'title required',
                'title.string'=>'Should be string',
                'content.required'=> 'should be text',
                'luggage.required'=> 'should be number',
                'door.required'=> 'should be number',
                'passenger.required'=> 'should be integer',
                'price.required'=> 'should be integer',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size exceeded',
        ];
    }

}
