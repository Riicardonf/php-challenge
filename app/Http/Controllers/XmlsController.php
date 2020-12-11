<?php

namespace App\Http\Controllers;

use App\Services\xmls\UploadService;
use Illuminate\Http\Request;

class XmlsController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService){
        $this->uploadService = $uploadService;
    }

    public function upload(Request $request){

        try{

            $response =  $this->uploadService->upload($request->file);

            return response()->json([$response, 200]);

        }catch(\Exception $err){

            return response()->json([$err->getMessage(), 400]);

        }

    }

    public function processXml(Request $request){

        try{
            $response = $this->uploadService->process($request->filename);

            return response()->json([$response, 200]);

        }catch(\Exception $err){

            return response()->json([$err->getMessage(), 400]);

        }

    }
}
