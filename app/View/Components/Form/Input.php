<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(
    public string $name,
    public string $label,
    public string $type = 'text',
    public string $value = '',
    public string $placeholder = '',
    public bool $required = false,
    public bool $disabled = false,
    public bool $readonly = false,
    public string $class = '',
    public string $id = '',
    public string $autocomplete = 'off',
    public string $autofocus = '',
    public string $min = '',
    public string $max = '',
    public string $step = '',
    public string $pattern = '',
    public string $title = '',
    public string $size = '',
    public string $maxlength = '',
    public string $minlength = '',
    public string $accept = '',
    public string $multiple = '',
    public string $spellcheck = '',
    public string $patternClass = '',
    public $subtext = null,
  ) {
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.form.input');
  }
}
