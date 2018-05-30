<?php

namespace App\Http\Controllers;

use App\trans_header;
use App\trans_detail;
use Illuminate\Http\Request;

class TransHeaderControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return trans_header::all();
    }

    public function check(Request $request)
    {
        $data ['response']       =  "Transmisi Info Detil Pembelian";
        $data ['trx_id']         =  "3209240500000075";
        $data ['merchant_id']    =  "32092";
        $data ['merchant']       =  "KiosTix";
        $data ['bill_no']        =  "98765123456789";
            $item [0]['product'] = "Invoice No. inv-985/2017-03/1234567891";
            $item [0]['qty']            = "1";
            $item [0]['amount']         = "1000000";
            $item [0]['payment_plan']   = "01";
            $item [0]['merchant_id']    = "32092";
            $item [0]['tenor']  = "00";
        $data ['bill_items']    =  $item;
        $data ['response_code'] =  "00";
        $data ['response_desc'] =  "Sukses";
   
         return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transStatus = "";
        $th         = new trans_header;
        $thcode     = $th->generateID();
        $data       = $request['data'];
        $totalqty   = 0;
        foreach($data as $section) { 
            $totalqty = $totalqty+ $section['qty']; 
        }
         
         $th['created_by']      = $request['created_by'];
         $th['qty']             = $totalqty;
         $th['status']          = 1;
         $th['note']            = "Test Booking Event";
         $th['event']           = $request['event'];
         $th['fee']             = $request['fee'];
         $th['ammount']         = $request['total_amount'];
         $th['c_email']         = $request['email'];
         $th['c_name']          = $request['name'];
         $th['c_phone']         = $request['phone'];
         $th['c_birth_date']    = $request['birth_date'];
         $th['c_city']          = $request['city'];
         
        if($th->save()){
            foreach($data as $section) { 
                 $td                 = new trans_detail;
                 $td['trans_header'] = $thcode;
                 $td['section']      = $section['section'];
                 $td['qty']          = $section['qty'];
                 $td['amount']       = $section['amount'];
                 $td->save();
            }
            $transStatus = "Transaction Success";
     
         }
         else {
            $transStatus = "Transaction Failed";
         }
     
      return response()->json(['data' => $th->toArray(), 'message' =>  $transStatus ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\trans_header  $trans_header
     * @return \Illuminate\Http\Response
     */
    public function show(trans_header $trans_header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\trans_header  $trans_header
     * @return \Illuminate\Http\Response
     */
    public function edit(trans_header $trans_header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\trans_header  $trans_header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trans_header $trans_header)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\trans_header  $trans_header
     * @return \Illuminate\Http\Response
     */
    public function destroy(trans_header $trans_header)
    {
        //
    }
}
