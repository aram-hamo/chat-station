<?php
use AramHamo\Mvc\Models\User;
$user = new User;

if(isset($_COOKIE["tokan"])){
  print_r($user->showWhere("tokan",$_COOKIE["tokan"]));
}else{
  header("Location: /auth/?type=register");
  exit;
}
