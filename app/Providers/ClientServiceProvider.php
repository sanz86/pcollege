<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Client;

class ClientServiceProvider extends ServiceProvider
{
    protected $client = [];
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->getClient();
        
        $this->app->bind('client',function(){
            return $this->client;
        });
    }
    
    protected function getClient()
    {
        $this->client = Client::getClient($this->app->clientId);
    }
}
