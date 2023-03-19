# This Package support DDD with laravel

to Install This Package Following this steps:

  1-Update your `composer.json` with following code
  
       "autoload": {
          "psr-4": {
              "App\\": "app/",
              "Database\\Factories\\": "database/factories/",
              "Database\\Seeders\\": "database/seeders/",
              "Src\\":"src/"
          }
      },
  2- run following command :
  
      composer dump-autoload

  3-setup package by writting folowing command : 
  
      composer require theaddresstech/ddd
      
 # usage 
 
  The package provide 2 commands:
  
  1-First command :
  
      php artisan ddd:directory
      
   after run  php artisan ddd:directory will generate `src` folder in base path this folder contain 3 major folders:
 
    1-Common: this will contain all common folders such as :
        
        1.1-Commands   :folder will contain all console commands files that will generate through project.
        
        1.2-Console    :folder will contain `kernel.php` that where All of your console commands are registered within your application's.
        
        1.3-Exceptions :folder will contain `kernel.php` This class contains a register method where you may register custom exception reporting and rendering callbacks
        
        1.4-Helpers    :folder will contain all helpers files that may need or adding new helper files as you need such as : `main.php`,`Enum.php`
        
        1.5-Http       :folder will contain: 
            1.5.1-Http Folder : Will contain Middleware Folder which will contain All middlewares that will available in project.
            
            1.5.2-kernel.php : This class is used to register your middleware
       
       1.6-Providers   :folder will contain  service providers that will bootstrp your own application such as (DomainServiceProvider,RouteServiceProvider,RepositoryServiceProvider`,HelperServiceProvider,EventServiceProvider,PolicyServiceProvider)
       
    2-Infrastructure will contain all infrastucture files that will be base calsses for classes that find in Domain Folder  such as:
    
        2.1-AbstractModels : contain BaseModel class that all entities  extend from it 
        
        2.2-AbstractProviders :contain ServiceProvider class that all service providers extend from it
        
        2.3-AbstractRepositories :contain basis calsses that all entity EloquentRepository and entity contract repository will extend from it
        
        2.4-Commands :contain basis calss that all commands in project will extend from it
        
        2.5-Contracts :contain BaseRepository class  that EloquentRepository extend from it and scope class that all scopes in class extend from it
        
        2.6-Http : contain basis for Controller,Request,Resource,Factory
        
        2.7-scoping: contain scoper class
        
        2.8-Traits :contain set of traits that will used in app
        
    3-Domain Holds the future-domains of the app by default Dashboard And User will be in Domain each domain contain folders 
    
      3.1-Database contain all migrations ,factotories,seeders entities in Domain
      
      3.2-Entities Contain all entities in Domain besides Traits Folder that contain (CustomAttributes folder contain entityAttributes and Relations Folder contain entity Relations )
      
      3.3-Http contain three folders (Controller ,Request ,Resources) in each folder contain contain logic for aspecific job
      
      3.4-Policies contain policy that declared in domain
      
      3.5-Providers contain providers that related to domain such as  (DomainServiceProvider,RouteServiceProvider,RepositoryServiceProvider`,HelperServiceProvider,EventServiceProvider,PolicyServiceProvider)
       
      3.6-Repositories contain two folder (Contracts,Eloquent) that are included to support l5 Repository
      
      3.7-Routes      contain two folder one for api  and other for web containing (auth,guest,public)
      
      3.8-Resources containing views related to Entites in Domain
      
      3.9-Traits   can declare traits that specific for each domain in it
      
    the command will modify the Kenel namespace in the `boostrap/app.php` + overwrite the service-providers namespaces in `config/app.php`
 
 2- second command : `php artisan ddd:make {type}`
 
    `{type}` can be : 
    
    `Domain` : create new folder in Domain with name that passes in command and will contain three folders (providers,routes,traits,contract)
   
    `Entity` : create new Entity in Entities Folder  in specified Domain
    
    `Repo`   : create new Repository in Repositories folder in specified Domain
    
    `Event`  : create new Event in Events folder in specified Domain and adding to listen in EventServiceProvider in specified Domain
    
    `Listener` : create new Listner in Listners folder in specified Domain and adding to listen in EventServiceProvider in specified Domain
    
    `Resource`   : create a new resource in a specified domain with apecific entity
    
    `Request`     : create a new Request in a specified domain
    
    `Rule`        :create a new Rule in a specified domain
    
    `Migration`    :create a new migration in a specified domain
    
    `Factory`     :create a new factory in a specified domain 
    
    `Seeder`     :create a new seeder in a specified domain
   
    `Notification` :create new notification in aspecified domain
    
    `Controller`   :create new controller in aspecified domain that can be (resource,sac)
   
    `Crud` : [ creates : Entity + DatabaseView + Migration + Factory + Seeder + Views + Datatable + Request + Repo + Resource + Controllers ]
  
  
  Please note that there are options that may be required in order to create any type and you will be asked throwghout the creation process. Therefore you can run the command above without specify any additional option

