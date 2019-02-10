<?php

namespace App\Providers;

use App\Charts\EsampleChart;
use App\Charts\TeacherChart;
use App\Level;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.master',function ($view){
            $view->with('sel_level',Level::get()->sortBy('name'));
        });
        view()->composer('layouts.app',function ($view){
            $chart=new TeacherChart();
            $teacher=Teacher::where("name",Auth::user()->name)->first();
            $courses=$teacher->lessons;
            $view->with(["courses"=>$courses,"rooms"=>$teacher->rooms,"chart"=>$chart]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
