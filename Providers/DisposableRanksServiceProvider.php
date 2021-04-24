<?php

namespace Modules\DisposableRanks\Providers;

use App\Services\ModuleService;
use Illuminate\Support\ServiceProvider;
use Route;

class DisposableRanksServiceProvider extends ServiceProvider
{
  protected $moduleSvc;

  /** Boot the application events */
  public function boot()
  {
    $this->moduleSvc = app(ModuleService::class);

    $this->registerRoutes();
    $this->registerTranslations();
    $this->registerConfig();
    $this->registerViews();
    $this->registerLinks();

    $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
  }

  /** Register The Service Provider **/
  public function register() { }

  /** Register Module Links **/
  public function registerLinks()
  {
    // Below two lines control the auto links in your navbar.
    $this->moduleSvc->addFrontendLink('Ranks', '/dranks', 'fas fa-tags', $logged_in=true);
    $this->moduleSvc->addFrontendLink('Awards', '/dawards', 'fas fa-trophy', $logged_in=true);
    // Do NOT disable admin link, it may cause errors in main admin panel
    $this->moduleSvc->addAdminLink('Disposable Ranks', '/admin/disposableranks');
  }

  /** Register Routes **/
  protected function registerRoutes()
  {
    /** Frontend Routes **/
    Route::group([
        'as'     => 'DisposableRanks.',
        'prefix' => '',
        'middleware' => ['web'],
        'namespace'  => 'Modules\DisposableRanks\Http\Controllers',
    ], function () {
      Route::group([
        'middleware' => ['auth'],
      ], function () {
        // Main Controller Routes
        Route::get('dawards', 'DispoAwardsController@awards')->name('dawards');
        Route::get('dranks', 'DispoRanksController@ranks')->name('dranks');
      });
    });

    /** Admin Routes **/
    Route::group([
        'as'     => 'DisposableRanks.',
        'prefix' => 'admin',
        'middleware' => ['web', 'role:admin'],
        'namespace'  => 'Modules\DisposableRanks\Http\Controllers',
    ], function () {
      Route::group([],
        function () {
        Route::get('disposableranks', 'DispoAdminController@admin')->name('disposableranksadmin');
      });
    });
  }

  protected function registerConfig()
  {
    $this->publishes([ __DIR__.'/../Config/config.php' => config_path('DisposableRanks.php'),], 'config');
    $this->mergeConfigFrom( __DIR__.'/../Config/config.php', 'DisposableRanks');
  }

  public function registerTranslations()
  {
    $langPath = resource_path('lang/modules/DisposableRanks');

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, 'DisposableRanks');
    } else {
      $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'DisposableRanks');
    }
  }

  public function registerViews()
  {
    $viewPath = resource_path('views/modules/DisposableRanks');
    $sourcePath = __DIR__.'/../Resources/views';

    $this->publishes([$sourcePath => $viewPath,], 'views');

    $this->loadViewsFrom(array_merge(array_map(function ($path) {
      return $path . '/modules/DisposableRanks';
    }, \Config::get('view.paths')), [$sourcePath]), 'DisposableRanks');
  }

  public function provides(): array { return []; }
}
