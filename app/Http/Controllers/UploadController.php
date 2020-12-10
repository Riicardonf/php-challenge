<?php

namespace App\Http\Controllers;

use App\Services\uploads\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService){
        $this->uploadService = $uploadService;
    }

    public function upload(Request $request){

        try{
            
           $response =  $this->uploadService->upload($request->file);

            return response()->json($response, 200);

        }catch(\Exception $err){

            return response()->json('Something is wrong!', 400);

        }


    }
}
