<?php


namespace App\Repositories\xmls;


interface IXmlsRepository
{
    public function upload($file);

    public function process($fileContent);

}
