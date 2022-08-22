<?php

namespace App\Http\Controllers\Api;

use App\Models\attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AttendanceResource;
use Database\Factories\AttendanceFactory;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        //get posts
        $att = attendance::latest()->paginate(5);

        //return collection of posts as a resource
        return new AttendanceResource(true, 'Attendance Lists', $att);
    }

    public function store(Request $request)
    {
               //define validation rules
               $validator = Validator::make($request->all(), [
                'attendAmount'  => 'required',
                'illAmount'     => 'required',
                'absenceAmount' => 'required'
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
    
            //create post
            $att = attendance::create([
                'attendAmount' => $request->attendAmount,
                'illAmount'    => $request->illAmount,
                'absenceAmount'=> $request->absenceAmount
            ]);
    
            //return response
            return new AttendanceResource(true, 'Attendance Added !', $att);
    }

    public function show(attendance $att)
    {
        return new AttendanceResource(true, 'Attendance Found!', $att);
    }

  
    public function update(Request $request, $id)
    {
        
        //define validation rules
        $validator = Validator::make($request->all(), [
            'attendAmount'  => 'required',
            'illAmount'     => 'required',
            'absenceAmount' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $att=attendance::find($id);
        $att->update($request->all());

        //return response
        return new AttendanceResource(true, 'Attendance Edited!', $att);
    }

    public function destroy($id)
    {
          //delete 
          attendance::destroy($id);

          //return response
        return new AttendanceResource(true, 'Position Deleted!', null);
    }
}
