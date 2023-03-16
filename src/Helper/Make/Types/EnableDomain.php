<?php

namespace theaddresstech\DDD\Helper\Make\Types;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Traits\Macroable;
use theaddresstech\DDD\Helper\FileCreator;
use theaddresstech\DDD\Helper\Make\Maker;
use theaddresstech\DDD\Helper\NamespaceCreator;
use theaddresstech\DDD\Helper\Naming;
use theaddresstech\DDD\Helper\Path;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use MohamedReda\DDD\Helper\Make\Types\Rule;

class EnableDomain extends Maker
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

        // Add Service Provider to config/app
        $service_provider = NamespaceCreator::Segments("Src","Domain",$this->name,"Providers","DomainServiceProvider");
        $app = File::get(config_path('app.php'));
        
       if(Str::of($app)->contains([$service_provider],[false]) ==false) {
           $content = Str::of($app)->replace("###DOMAINS SERVICE PROVIDERS###", $service_provider . "::class,\n\t\t###DOMAINS SERVICE PROVIDERS###");
           $this->save(config_path(), 'app', 'php', $content);
           return true;
       }
        error_log("This Domain Is Already Enabled");
       
        return false;
    }
}
