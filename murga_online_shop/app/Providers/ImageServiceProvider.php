<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Util\ImageWebStorage;
use App\Util\ImageLocalStorage;



class ImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ImageStorage::class, function ($app, $params) {
            $storage = $params['storage'];
            if ($storage == "local") {
                return new ImageLocalStorage();
            } else if ($storage == "web") {
                return new ImageWebStorage();
            }
        });
    }
}
