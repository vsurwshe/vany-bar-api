<?php

namespace App\Http\Controllers;

use App\Models\BarBottels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarBottelsController extends Controller{
    
    protected $request;
    
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    
    // this method will get all bottles list by user
    public function getAllBottelElements(){
        try {
            $user = $this->request->user();
            $bottelList = BarBottels::where('user_id',$user->user_id)->get();
            return response()->json(['message'=>'Success','data'=>$bottelList],200);
        } catch (\Exception $th) {
            return response()->json(['message'=>$th->getMessage()],400);
        }
    }

    // this method will get single bottel data
    public function singleBottel($id){
        try {
            $bottelData = BarBottels::findOrFail($id);
            if($bottelData){
                return response()->json(['Data' => $bottelData], 200);
            }else{
                return response()->json(['message' => 'Data is not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $th->getMessage()], 400);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request){
        try {
            $validator = $this->validateStore();
            if($validator->fails()){
                throw new \Exception($validator->messages(),400);
            }
            $user = $this->request->user();
            $request->request->add(['user_id' => $user->user_id]);
            $barBottelData=$request->all();
            $result=BarBottels::create($barBottelData);
            if($result){
                throw new \Exception('Successfully created bottel data',200);
            }else{
                throw new \Exception("Successfully not save bottel data",400);
            }
        } catch (\Exception $th) {
            return response()->json(['message'=>$th->getMessage()],$th->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarBottels  $barBottels
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request){
        try {
            $validator = $this->validateStore();
            if($validator->fails()){
                throw new \Exception($validator->messages(),400);
            }
            $barBottelData=$request->all();
            $result = BarBottels::where('bar_bottel_id',$id)->update($barBottelData);
            if($result){
                throw new \Exception("$id by id bottel data updated successfully", 200);
            }else{
                throw new \Exception("$id by id bottel data not updated successfully", 400);
            }
        } catch (\Exception $th) {
            return response()->json(['message'=>$th->getMessage()],$th->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarBottels  $barBottels
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        try {
            $result = BarBottels::where('bar_bottel_id',$id)->delete();
            if($result){
                throw new \Exception("$id by id bottel data deleted successfully", 200);
            }else{
                throw new \Exception("$id by id bottel data not deleted successfully", 404);
            }
        } catch (\Exception $th) {
            return response()->json(['message'=>$th->getMessage()],$th->getCode());
        }
    }

    public function validateStore(){
        return Validator::make(request()->all(), [
            'bar_bottel_name' => 'required',
            'bar_bottel_unit_price' => 'required',
            'bar_bottel_per_case_count' => 'required',
            'bar_bottel_packing' => 'required',
            'bar_bottel_total_qty' => 'required'
        ]);
    }
}
