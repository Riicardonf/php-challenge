<?php


namespace App\Services\xmls;


use App\Repositories\xmls\IXmlsRepository;
use App\Models\Xmls;
use Illuminate\Support\Facades\File;

class UploadService implements IXmlsRepository
{

    public function upload($file)
    {
        if($file->getClientOriginalExtension() != 'xml'){
           throw new \Exception('Apenas arquivos XML');
        }

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

    public function process($filename)
    {
        $storage = storage_path('tmp');

        $file['xml_content'] = File::get("{$storage}/{$filename}");

        try{

            $process = Xmls::create($file);

            if($process){
                File::Delete("{$storage}/{$filename}");
            }

            return response()->json("XML process with success", 200);


        }catch(\Exception $err){

            throw new \Exception("Something wrong!");

         }
    }
}
