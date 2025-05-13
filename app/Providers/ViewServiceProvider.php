<?php

namespace App\Providers;

use App\Http\Controllers\Frontend\PageController;
use App\Http\Services\Impl\AboutServiceInterface;
use App\Http\Services\Impl\CategoryServiceInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $currentAction = Route::currentRouteAction();

            $controllers = [
                PageController::class,
            ];

            if ($currentAction) {
                foreach ($controllers as $controller) {
                    if (str_starts_with($currentAction, $controller)) {
                        $categoryService = app(CategoryServiceInterface::class);
                        $aboutService = app(AboutServiceInterface::class);
                        $categories = $categoryService->findAll();
                        $about = $aboutService->getOne();
                        $view->with([
                            'categories' => $categories,
                            'about' => $about,
                        ]);
                        break;
                    }
                }
            }
        });
    }
}
