<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\CommonModel;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $common         = new CommonModel();
            $main_menu      = $common->viewData('tbl_main_menu', '*', ['status' => '1', 'is_deleted' => '0']);
            $menusArr       = [];
            foreach($main_menu as $main) {
                $submenus       = $common->viewData('tbl_submenu', '*', ['menu_id' => $main->id,'status' => '1', 'is_deleted' => '0']);
                $menusArr[]     = [
                    'main_menu' => $main,
                    'sub_menu'  => $submenus
                ];
            }
            $data['menu_list']  = $menusArr;
            $data['settings']   = $common->getSingleData('tbl_setting', '*', ['status' => '1', 'is_deleted' => '0']);
            $view->with('layout_data', $data);
        });
    }
}
