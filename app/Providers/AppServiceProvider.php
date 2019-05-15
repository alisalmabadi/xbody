<?php

namespace App\Providers;

use App\Ads;
use App\ArticleCategory;
use App\Cart;
use App\Category;
use App\Menu;
use App\Product;
use App\ProductReserve;
use App\Reserve;
use App\User;
use Illuminate\Support\ServiceProvider;
use App\Setting;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

	    \Schema::defaultStringLength(191);
	    view()->composer('*', function ($view) {
			if(\Request::route())
			{
		        $current_route_name = \Request::route()->getName();
		        $view->with('current_route_name', $current_route_name);
			}
	    });

	    view()->composer('*',function($view){
	        if(\Request::route()){
	            $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();
	            $view->with('user',$user);
            }
        });

        view()->composer('*',function($view){
            $setting=Setting::first();
            $view->with('setting',$setting);
        });
        view()->composer('*',function($view){
            $ads=Ads::all()->take(2);
            $view->with('ads',$ads);
        });

        view()->composer('*',function($view){
            $menus=Menu::all();
            $view->with('menus',$menus);
        });
        view()->composer('*',function($view){
            $reserve_count=Reserve::where([['user_id',null],['status',1],['stage',0]])->orderBy('id','DESK')->count();
            $view->with('reserve_count',$reserve_count);
        });
        view()->composer('*',function($view){
            $product_count=ProductReserve::where('status',0)->count();
            $view->with('product_count',$product_count);
        });

        Category::deleted(function($category) {
            $category->products()->delete();
        });
     /*   Offers::restored(function($offer) {
            $offer->services()->withTrashed()->restore();
        });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
	    if ($this->app->environment() !== 'production') {
		    $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
	    }
		$this->app->register('Collective\Html\HtmlServiceProvider');
		$this->app->register('Joselfonseca\ImageManager\ImageManagerServiceProvider');
    }
}
