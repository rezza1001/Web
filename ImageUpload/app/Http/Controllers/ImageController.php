<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
       /**

    * Create view file

    *

    * @return void

    */

    public function imageUpload()

    {

        return view('image-upload');

    }


    /**

    * Manage Post Request

    *

    * @return void

    */

    public function imageUploadPost(Request $request)

    {
        if ($request->image){
            $xvalidate = $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->file('image')->move(public_path('rezza'), $imageName);
            return "SUCCESS";
        }
        else {
             $request['status'] = "GAGAL_PARAM";
            return $request->get();
            // return "GAGAL PARAMETER";
        }

    }

}
