<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trans_detail extends Model
{
    protected $table = 'trans_detail';
    protected $fillable = ['trans_header', 'section', 'qty', 'amount'];
}