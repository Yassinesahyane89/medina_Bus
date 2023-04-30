<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class CrudCreate extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'crud:create {name} {path?}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create a new CRUD';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $name = $this->argument('name');
    $path = $this->argument('path');

    $this->createController($name, $path);

    $this->createLivewireForm($name, $path);

    $this->createLivewireTable($name, $path);

    $this->createBladeView($name, $path);

    Artisan::call('make:model', [
      'name' => ucfirst($name),
      '--migration' => true,
      '--quiet' => true,
    ]);

    $this->components->info('Model created successfully.');

    // success message for all is done in console
    $this->components->info('CRUD created successfully.');

    return Command::SUCCESS;
  }

  public function createController($name, $path = '')
  {
    $stubPathController = $this->getStubPath() . '/Controller.php.stub';

    $fullPathTo = app_path() . '\Http\Controllers\\' . $path . '\\' . ucfirst($name) . 'Controller.php';

    Artisan::call('make:controller', [
      'name' => $path . '\\' . ucfirst($name) . 'Controller',
      '--quiet' => true,
    ]);

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{CONTROLLER_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name')) . 'Controller'
      ],
      file_get_contents($stubPathController)
    ));

    $this->components->info('Controller created successfully.');
  }

  public function createLivewireForm($name, $path)
  {

    Artisan::call('make:livewire', [
      'name' => $path . '\\' . ucfirst($name) . '\\Form',
      '--quiet' => true,
    ]);

    $stubPathLivewire = $this->getStubPath() . '\\livewire\\' . '\\Form.php.stub';
    $fullPathTo = app_path() . '\\Http\\Livewire\\' . $path . '\\' . ucfirst($name) . '\\Form.php';

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{LIVEWIRE_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name'))
      ],
      file_get_contents($stubPathLivewire)
    ));

    //views

    $stubPathLivewire = $this->getStubPath() . '\\views\\livewire' . '\\form.blade.php.stub';
    $fullPathTo = resource_path('views') . '\\livewire\\' . $path . ucfirst($name) . '\\form.blade.php';

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{LIVEWIRE_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name'))
      ],
      file_get_contents($stubPathLivewire)
    ));

    $this->components->info('Livewire Form created successfully.');
  }

  public function createLivewireTable($name, $path)
  {

    Artisan::call('make:livewire', [
      'name' => $path . '\\' . ucfirst($name) . '\\Table',
      '--quiet' => true,
    ]);

    $stubPathLivewire = $this->getStubPath() . '\\livewire\\' . '\\Table.php.stub';
    $fullPathTo = app_path() . '\\Http\\Livewire\\' . $path . '\\' . ucfirst($name) . '\\Table.php';

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{LIVEWIRE_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name'))
      ],
      file_get_contents($stubPathLivewire)
    ));

    //views

    $stubPathLivewire = $this->getStubPath() . '\\views\\livewire' . '\\table.blade.php.stub';
    $fullPathTo = resource_path('views') . '\\livewire\\' . $path . ucfirst($name) . '\\table.blade.php';

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{LIVEWIRE_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name'))
      ],
      file_get_contents($stubPathLivewire)
    ));

    $this->components->info('Livewire table created successfully.');
  }

  public function createBladeView($name, $path)
  {
    //views

    $stubPath = $this->getStubPath() . '\\views\\blade' . '\\table.blade.php.stub';
    $fullPathTo = resource_path('views/content') . $path . '\\' . ($name) . '\\table.blade.php';

    Storage::disk('resource')->move($stubPath, 'views\\content\\' . $path . '\\' . ($name) . '\\table.blade.php');

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{LIVEWIRE_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name'))
      ],
      file_get_contents($stubPath)
    ));

    $stubPath = $this->getStubPath() . '\\views\\blade' . '\\form.blade.php.stub';
    $fullPathTo = resource_path('views/content') . $path . '\\' . ($name) . '\\form.blade.php';

    Storage::disk('resource')->move($stubPath, 'views\\content\\' . $path . '\\' . ($name) . '\\form.blade.php');

    file_put_contents($fullPathTo, str_replace(
      [
        '{{NAME}}', '{{MODEL_NAME}}', '{{LIVEWIRE_NAME}}'
      ],
      [
        $this->argument('name'), ucfirst($this->argument('name')),  ucfirst($this->argument('name'))
      ],
      file_get_contents($stubPath)
    ));

    $this->components->info('Blade view created successfully.');
  }

  public function getStubPath()
  {
    return base_path('stubs/for_crud_create');
  }
}
