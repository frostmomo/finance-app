<?php

namespace App\Http\Controllers\Api;

use App\Models\employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Models\division;
use Database\Factories\EmployeeFactory;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        //get posts
        $emp = employee::latest()->paginate(5);

        //return collection of posts as a resource
        return new EmployeeResource(true, 'Employee Lists', $emp);
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
            $emp = employee::create([
                'name'     => $request->name
            ]);
    
            //return response
            return new EmployeeResource(true, 'Employee Added !', $emp);
    }

    public function show(employee $emp)
    {
        return new EmployeeResource(true, 'Employee Found!', $emp);
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

        $emp=employee::find($id);
        $emp->update($request->all());

        //return response
        return new EmployeeResource(true, 'employee Edited!', $emp);
    }

    public function destroy($id)
    {
          //delete 
          employee::destroy($id);

          //return response
        return new EmployeeResource(true, 'employee Deleted!', null);
    }
}
