<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new class {
    private array $bindings = [];
    
    public function bind(string $abstract, mixed $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }
    
    public function singleton(string $abstract, mixed $concrete): void
    {
        $this->bind($abstract, $concrete);
    }
    
    public function make(string $abstract): mixed
    {
        if (isset($this->bindings[$abstract])) {
            $concrete = $this->bindings[$abstract];
            return $concrete instanceof Closure ? $concrete($this) : $concrete;
        }
        
        // If binding doesn't exist, try to instantiate the class directly
        if (class_exists($abstract)) {
            return new $abstract();
        }
        
        throw new Exception("Unable to resolve {$abstract}");
    }
    
    public function registerConfiguredProviders(): void
    {
        // Placeholder for provider registration
    }
    
    public function boot(): void
    {
        // Placeholder for application boot
    }
};

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;