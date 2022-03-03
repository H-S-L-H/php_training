<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\AuthDaoInterface', 'App\Dao\AuthDao');
        $this->app->bind('App\Contracts\Dao\ForgetPasswordDaoInterface', 'App\Dao\ForgetPasswordDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\AuthServiceInterface', 'App\Services\AuthService');
        $this->app->bind('App\Contracts\Services\ForgetPasswordServiceInterface', 'App\Services\ForgetPasswordService');
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
