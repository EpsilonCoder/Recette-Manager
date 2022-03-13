<?php

namespace App\Providers;

use App\Models\Ingredient;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // dans la vue recipes.create

        View::composer('recipes.create', function ($view) {
            $view->with('ingredients', Ingredient::all());
        });

        //Attenton apres avoir creer un nouveau service provider faut
        //L enregister
    }
}
