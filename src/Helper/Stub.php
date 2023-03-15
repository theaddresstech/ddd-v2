<?php

namespace islamss\DDD\Helper;

use islamss\DDD\Helper\Make\Types\Controller;
use islamss\DDD\Helper\Make\Types\DatabaseView;
use islamss\DDD\Helper\Make\Types\Datatable;
use islamss\DDD\Helper\Make\Types\Domain;
use islamss\DDD\Helper\Make\Types\Entity;
use islamss\DDD\Helper\Make\Types\Factory;
use islamss\DDD\Helper\Make\Types\Migration;
use islamss\DDD\Helper\Make\Types\Seeder;
use islamss\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait Stub
{
    /**
     * Retrieve the path to a specific stub
     *
     * @param [type] $name
     * @return string
     */
    public function stubPath():string{

        $directories = ArrayFormatter::trim($this->stub,DIRECTORY_SEPARATOR);

        $file = array_pop($directories);

        $path = Path::stub(...$directories).$file;

        return $path;
    }

        /**
     * Retrieve the path to a specific stub
     *
     * @param [type] $name
     * @return string
     */
    public function stubContent():string{

        return File::get($this->stubPath());

    }

    /**
     * Get Stub
     *
     * @param string $name
     * @return string
     */
    public function getStub($name,$content = true){

        $stubs = config('ddd.stubs');
        if(array_key_exists($name,$stubs)){

            $path = Path::stub().ltrim($stubs[$name],DIRECTORY_SEPARATOR);

            return $content === true ? File::get($path) : $path;
        }else{
            throw new \Exception("File Not Found");
            exit();
        }

    }

}
