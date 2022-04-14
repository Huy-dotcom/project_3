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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.index', function ($view) {
            $data1 = \DB::select(
                'SELECT DATE_FORMAT(o.created_at,"%d/%m/%Y") order_day, SUM(o.total) total_price FROM orders o WHERE o.status = 2 GROUP BY order_day'
            );
            $data2 =  \DB::select(
                'SELECT MONTH(o.created_at) order_month, SUM(o.total) total_price FROM orders o WHERE o.status = 2 GROUP BY order_month'
            );
            $data3 = \DB::select(
                'SELECT YEAR(o.created_at) order_year, SUM(o.total) total_price FROM orders o WHERE o.status = 2 GROUP BY order_year'
            );
            $view->with(['data1' => $data1, 'data2' => $data2, 'data3' => $data3]);
        });
    }
}
