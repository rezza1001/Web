<?php

namespace App\Http\Controllers;

use App\Sequence;
use Illuminate\Http\Request;

class SequenceController
{
  
   public $sq_no = 0;
   public function __construct($code, $prefix)
   {
        $sequence       = Sequence::where('code','=',$code)->first();
        if (is_null($sequence )){
            $this->sq_no = "0";
        }
        else {
            $now = now()->format('dmY');
            $inc = $sequence['sqno'] + 1;
            $this->sq_no    = $now.$prefix.$inc;
            $sequence->update(['sqno' => $inc]);
        }
   }    
   public function get(){
      return $this->sq_no;
   }

}
