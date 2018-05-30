<?php

namespace App\Http\Controllers\lib;

use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyPaginator 
{
	public $result;

	public function __construct($query, $perpage){
		$Qtotal 	= DB::select($query);
		$total 		= count($Qtotal);

		$page = null;
        $page = $page ?: Paginator::resolveCurrentPage("page");
        $max =  $perpage;
        $start = ($page - 1) * $max;

        // dd("select email as work_date from users limit ".$perpage." offset ".$offset);

        $data = DB::select($query." limit ".$max." offset ".$start);
        $this->result = $this->paginator($data,$total,$max,$page,[
            'path' => Paginator::resolveCurrentPath()
        ]);

	}

	public function get(){
		return $this->result;
	}

	protected function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }

}