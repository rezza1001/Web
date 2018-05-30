<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests;
use App\Inbox;
use Auth;
use Activity;

class InboxController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
    * Display a listing of Data.
    **/
    public function index()
    {
      $inboxs = Inbox::latest('created_at')->paginate(20);
      return view('admin.inbox.index',compact('inboxs'));
    }
    /**
    * Create Data.
    **/
    public function show($id)
    {
        $inbox = Inbox::find($id);
        return view('admin.inbox.view',compact('inbox'));
    }
    /**
    * Store Data.
    **/
    public function store()
    {
    }
    /**
    * Edit Data.
    **/
    public function edit(Inbox $inbox)
    {
        return view('admin.inbox.edit',compact('inbox'));
    }
    /**
    * Update Data.
    **/
    public function update()
    {
    }
    /**
    * Delete Data.
    **/
    public function destroy($request)
    {
        Inbox::find($request)->delete();
        return redirect()->back();
    }

}
