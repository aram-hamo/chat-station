<?php declare(strict_types=1);
namespace AramHamo\Mvc\Controllers;
use AramHamo\MvcCore\View;
use AramHamo\MvcCore\Middleware;

class Chat{
  public function get(){
    $m = new Middleware;
    $m->middleware("auth");
    return View::render("chat",array("title"=>"chat"));
  }
  public function post(){
  }
  public function update(){
  }
  public function delete(){
  }
}
