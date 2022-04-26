<?php

namespace App\Controllers;

class Controller
{
  protected $c;

  public function __construct($c)
  {
    $this->c = $c;
  }
}
