<?php

namespace App\Providers;

use App\Contracts\ServiceContract;
use App\Services\Book\BookCreate;
use App\Services\Book\BookDelete;
use App\Services\Book\BookUpdate;
use App\Services\Member\MemberCreate;
use App\Services\Member\MemberDelete;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ServiceContract::class, BookCreate::class);
        $this->app->bind(ServiceContract::class, BookDelete::class);
        $this->app->bind(ServiceContract::class, BookUpdate::class);

        $this->app->bind(ServiceContract::class, MemberCreate::class);
        $this->app->bind(ServiceContract::class, MemberDelete::class);
        $this->app->bind(ServiceContract::class, MemberUpdate::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    private $binds = [
        BookUpdate::class
    ];
}
