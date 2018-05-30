<?php

namespace App;


class MyResponse 
{
    public $error_code;
    public $error_desc;
    public $data;
    public $response;

    public function __construct($error_code, $error_desc,$data){
    	$this->error_code = $error_code;
    	$this->error_desc = $error_desc;
    	$this->data 	  = $data;
    }

    public function __toString()
    {
    	$this->response ['error_code'] = $this->error_code;
    	$this->response ['error_desc'] = $this->error_desc;
    	$this->response ['data'] = $this->data;
        return $this->error_desc;
    }

    public function get(){
    	$this->response ['error_code'] = $this->error_code;
    	$this->response ['error_desc'] = $this->error_desc;
    	$this->response ['data'] = $this->data;
    	return $this->response;
    }
}
