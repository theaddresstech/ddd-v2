<?php

namespace islamss\DDD\Helper\Make\Types;

use islamss\DDD\Helper\FileCreator;
use islamss\DDD\Helper\Make\Maker;
use islamss\DDD\Helper\NamespaceCreator;
use islamss\DDD\Helper\Naming;
use islamss\DDD\Helper\Path;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Observer extends Maker
{
    /**
     * Options to be available once Command-Type is called
     *
     * @return Array
     */
    public $options = [
        'domain',
        'entity'
    ];

    /**
     * Return options that should be treated as choices
     *
     * @return Array
     */
    public $allowChoices = [
        'domain',
        'entity'
    ];

    /**
     * Check if the current options is True/False question
     *
     * @return Array
     */
    public $booleanOptions = [];

    /**
     * Check if the current options is requesd based on other option
     *
     * @return Array
     */
    public $requiredUnless = [];

    /**
     * Fill all placeholders in the stub file
     *
     * @param array $values
     * @return boolean
     */
    public function service(Array $values = []):bool{

        $placeholders = [
            '{{DOMAIN}}' => $values['domain'],
            '{{ENTITY}}' => $values['entity'],
            '{{ENTITY_LC}}' => Str::lower($values['entity']),
        ];

        $dir = Path::toDomain($values['domain'],'Observers');

        if(!File::isDirectory($dir)){
            File::makeDirectory($dir);
        }

        $destination = Path::build($dir,$values['entity'].'Observer.php');

        $content = Str::of($this->getStub('observer'))
                        ->replace(array_keys($placeholders),array_values($placeholders));
        File::put($destination,$content);

        return true;
    }

}
