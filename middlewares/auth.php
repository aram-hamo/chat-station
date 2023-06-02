<?php
use AramHamo\Mvc\Models\User;
$user = new User;

if(isset($_COOKIE["tokan"])){
  $userdata = $user->showWhere("tokan",$_COOKIE["tokan"]);
  if(!isset($userdata[0])){
    header("Location: /auth/?type=register");
  }
}else{
  header("Location: /auth/?type=register");
  exit;
}
