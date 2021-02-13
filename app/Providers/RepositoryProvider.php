<?php

namespace App\Providers;

use App\Interfaces\BaseRepositoryInterface;
use App\Repository\FederalEntityRepository;
use App\Repository\MunicipalityRepository;
use App\Repository\ZipCodeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class);
        $this->app->bind(
            FederalEntityRepository::class,
            MunicipalityRepository::class,
            ZipCodeRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
