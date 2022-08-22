<?php

namespace App\Http\Controllers\Api;

use App\Models\division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DivisionResource;
use Database\Factories\DivisionFactory;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    public function index()
    {
        //get posts
        $div = division::latest()->paginate(5);

        //return collection of posts as a resource
        return new DivisionResource(true, 'Division Lists', $div);
    }

    public function store(Request $request)
    {
               //define validation rules
               $validator = Validator::make($request->all(), [
                'name'   => 'required'
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
    
            //create post
            $div = Division::create([
                'name'     => $request->name
            ]);
    
            //return response
            return new DivisionResource(true, 'Division Added !', $div);
    }

    public function show(division $div)
    {
        return new DivisionResource(true, 'Division Found!', $div);
    }

  
    public function update(Request $request, $id)
    {
        
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $div=division::find($id);
        $div->update($request->all());

        //return response
        return new DivisionResource(true, 'Division Edited!', $div);
    }

    public function destroy($id)
    {
          //delete post
          division::destroy($id);
        //   $div->delete();

          

          //return response
        return new DivisionResource(true, 'Division Deleted!', null);
    }
}
