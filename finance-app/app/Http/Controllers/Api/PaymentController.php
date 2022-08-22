<?php

namespace App\Http\Controllers\Api;

use App\Models\payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentResource;
use Database\Factories\PaymentFactory;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        //get posts
        $pay = payment::latest()->paginate(5);

        //return collection of posts as a resource
        return new PaymentResource(true, 'Payment Lists', $pay);
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
            $pay = payment::create([
                'attendAmount' => $request->attendAmount,
                'illAmount'    => $request->illAmount,
                'absenceAmount'=> $request->absenceAmount
            ]);
    
            //return response
            return new PaymentResource(true, 'Payment Added !', $pay);
    }

    public function show(payment $pay)
    {
        return new PaymentResource(true, 'Payment Found!', $pay);
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

        $pay=payment::find($id);
        $pay->update($request->all());

        //return response
        return new PaymentResource(true, 'Payment Edited!', $pay);
    }

    public function destroy($id)
    {
          //delete 
          payment::destroy($id);

          //return response
        return new PaymentResource(true, 'Position Deleted!', null);
    }
}
