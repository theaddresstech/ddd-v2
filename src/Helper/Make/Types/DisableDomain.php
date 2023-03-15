<?php

namespace islamss\DDD\Helper\Make\Types;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Traits\Macroable;
use islamss\DDD\Helper\FileCreator;
use islamss\DDD\Helper\Make\Maker;
use islamss\DDD\Helper\NamespaceCreator;
use islamss\DDD\Helper\Naming;
use islamss\DDD\Helper\Path;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use MohamedReda\DDD\Helper\Make\Types\Rule;

class DisableDomain extends Maker
{
    /**
     * Holds the domain's name
     *
     * @var string
     */
    private $name;
    /**
     * Options to be available once Command-Type is called
     *
     * @return Array
     */
    public $options = [
        'domain',
    ];

    /**
     * Return options that should be treated as choices
     *
     * @return Array
     */
    public $allowChoices = [
        'domain',
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
     * @return Boll
     */
    public function service(Array $values):Bool{
        $this->name=$values['domain'];

        return $this->modifyConfig();

    }
    public function modifyConfig(){

        // Remove Service Provider from config/app
        $service_provider = NamespaceCreator::Segments("Src","Domain",$this->name,"Providers","DomainServiceProvider");
        $app = File::get(config_path('app.php'));
        //
       if(Str::of($app)->contains([$service_provider],[false]) ==true) {
           $content = Str::of($app)->replace($service_provider."::class,","");
           $this->save(config_path(), 'app', 'php', $content);
           return true;
       }
        error_log("This Domain Is Already Disabled");
       
        return false;
    }
}
