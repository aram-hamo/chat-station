<?php
use AramHamo\Mvc\Models\User;
use AramHamo\Mvc\Models\Chat;
header("Content-Type: application/json");

$user = new User;
$chat = new Chat;

if(isset(getallheaders()["tokan"])){
  $userData = $user->showWhere("tokan",getallheaders()["tokan"]);
  if(!isset($userData[0])) exit;
  if($userData[0]["tokan"] !== getallheaders()["tokan"]) exit;

switch($_POST['action']){
  case "newMessage":
    $chat->message = $_POST["message"] ?? '';
    $chat->to_user = $_POST["toUser"] ?? '';
    $chat->from_user = $userData[0]["username"]; 
    $chat->time = time();
    print_r(json_encode(array("return"=>$chat->create())));
  break;
  case "usernameExists":
  if($_POST["action"] ?? '' == "usernameExists"){
    if(isset($user->showWhere("username",$_POST["username"])[0])){
      print_r(json_encode(array("return"=>true)));
    }else{
      print_r(json_encode(array("return"=>false)));
    }
  }
  break;
}
}
