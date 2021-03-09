<?php

namespace App\Http\Controllers;

use App\Models\BillIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillIndexController extends Controller{
    protected $request;
    
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try {
            $user = $this->request->user();
            $billIndexList = BillIndex::where('user_id',$user->user_id)->get();
            return response()->json(['message'=>'Success','data'=>$billIndexList],200);
        } catch (\Exception $th) {
            return response()->json(['message'=>$th->getMessage()],400);
        }
    }

    // this method will get single bottel data
    public function singleBillIndex($id){
        try {
            $billIndexData = BillIndex::findOrFail($id);
            if($billIndexData){
                return response()->json(['Data' => $billIndexData], 200);
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
        $validator = $this->validateStore();
        if($validator->fails()){
            throw new \Exception($validator->messages(),400);
        }
        $billItemList=$request->input('bill_items');
        // this condtion checks whether we provide invoice items or not
        if(sizeof($invoiceItemList) > 0){
            $user = $this->request->user();
            $billIndex = new BillIndex();
            $total_cis=0;
            $total_bottels=0;
            $sub_total=0;
            $this->calculateSubTotal($billItemList,$sub_total,$total_bottels,$total_cis);
            

            $grossAmount=0;


        }else {
            throw new \Exception('Please provide at least one bill item',400);
        }

    }

    // this method calculting the total values
    public function calculateSubTotal($itemList, $sub_total, $total_bottels, $total_cis){
        if(sizeof($itemList)>0){
            foreach($itemList as $item){
                $sub_total+=$item["bill_item_amount"];
                $total_bottels+=$item["bill_item_bottels"];
                $total_cis+=$item["bill_item_cis"];
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillIndex  $billIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillIndex $billIndex){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillIndex  $billIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillIndex $billIndex){
        //
    }

    public function validateStore(){
        return Validator::make(request()->all(), [
            'name' => 'required',
            'invoice_number' => 'required',
            'pan_number' => 'required',
            'vat_number' => 'required',
            'date' => 'required',
            'tp_number' => 'required',
            // 'sub_total' => 'required',
            'startup_fee' => 'required',
            'carraying_forwrding' => 'required',
            'cash_discount' => 'required',
            // 'gross_amount' => 'required',
            // 'total_cis' => 'required',
            // 'total_bottels' => 'required',
            // 'net_amount' => 'required',
            'user_id' => 'required',
            'bill_items'   => 'required|array|min:1',
            'bill_items.*.bill_item_mrp' => 'required',
            'bill_items.*.bill_item_particulars' => 'required',
            'bill_items.*.bill_item_packing' => 'required',
            'bill_items.*.bill_item_cis' => 'required',
            'bill_items.*.bill_item_bottels' => 'required',
            'bill_items.*.bill_item_rate' => 'required',
            'bill_items.*.bill_item_amount' => 'required'
        ]);
    }
}
