<?php declare(strict_types=1);
namespace AramHamo\Mvc\Controllers;
use AramHamo\MvcCore\View;
use AramHamo\MvcCore\Middleware;

class Home{
  public function get(){
    $m = new Middleware;
    $m->middleware("auth");
    return View::render("home",array("title"=>"home"));
  }
  public function post(){
    $this->get();
  }
  public function update(){
    $this->get();
  }
  public function delete(){
    $this->get();
  }
}
