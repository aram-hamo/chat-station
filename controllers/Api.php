<?php declare(strict_types=1);
namespace AramHamo\Mvc\Controllers;
use AramHamo\MvcCore\View;

class Api{
  public function get(){
    return View::render("api",array("title"=>"api"));
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
