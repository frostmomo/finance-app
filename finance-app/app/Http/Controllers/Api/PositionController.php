<?php

namespace App\Http\Controllers\Api;

use App\Models\position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PositionResource;
use Database\Factories\PositionFactory;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    public function index()
    {
        //get posts
        $pos = position::latest()->paginate(5);

        //return collection of posts as a resource
        return new PositionResource(true, 'Position Lists', $pos);
    }

    public function store(Request $request)
    {
               //define validation rules
               $validator = Validator::make($request->all(), [
                'name'   => 'required',
                'amount' => 'required'
            ]);
    
            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
    
            //create post
            $pos = Position::create([
                'name'     => $request->name,
                'amount'   => $request->amount
            ]);
    
            //return response
            return new PositionResource(true, 'Position Added !', $pos);
    }

    public function show(position $pos)
    {
        return new PositionResource(true, 'Position Found!', $pos);
    }

  
    public function update(Request $request, $id)
    {
        
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'amount'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pos=position::find($id);
        $pos->update($request->all());

        //return response
        return new PositionResource(true, 'Position Edited!', $pos);
    }

    public function destroy($id)
    {
          //delete 
          position::destroy($id);

          //return response
        return new PositionResource(true, 'Position Deleted!', null);
    }
}
