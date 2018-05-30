<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class trans_header extends Model

{
	protected $table = 'trans_header';
    protected $fillable = ['code', 'created_by', 'qty', 'status', 'note', 'event', 'fee','ammount','c_email','c_name','c_phone','c_birth_date','c_city'];



    public function generateID()
    {
    	// $current_time = Carbon::now()->toDateTimeString();
    	$milliseconds = round(microtime(true) * 1000);
        $this->code = $milliseconds;
        return $this->code;
    }
}