<?php


namespace App\Services\uploads;


use App\Repositories\uploads\IUploadRepository;

class UploadService implements IUploadRepository
{

    public function upload($file)
    {
        $pathToStorage = storage_path('tmp');

        if(!file_exists($pathToStorage)){
            mkdir($pathToStorage, 0777, true);
        }

        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        
        $file->move($pathToStorage, $name);

        return response()->json([
            'success'               => true,
            'name'                  => $name
        ]);
    }
}
