<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Salahhusa9\Menu\Facades\Menu;

class MenuServiceProvider extends ServiceProvider
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
        Menu::add('Home', 'home', 'tf-icons ti ti-smart-home')
        ->addSubmenu('Buses', function ($menu) {
          $menu->add('List Buses', 'bus.index');
          $menu->add('Add bus', 'bus.create');
        },'')
        ->addSubmenu('Stations', function ($menu) {
          $menu->add('List Stations', 'station.index');
          $menu->add('Add station', 'station.create');
        }, '')
        ->addSubmenu('Lines', function ($menu) {
          $menu->add('List Lines', 'line.index');
          $menu->add('Add line', 'line.create');
        }, '')
        ->addSubmenu('Schedules', function ($menu) {
          $menu->add('List Schedules', 'schedule.index');
          $menu->add('Add Schedule', 'schedule.create');
        }, '')
        ->addSubmenu('Admins', function ($menu) {
          $menu->add('List Admins', 'admin.index');
          $menu->add('Add admin', 'admin.create');
        }, '');
  }
}
