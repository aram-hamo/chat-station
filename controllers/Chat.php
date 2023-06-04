<?php declare(strict_types=1);
namespace AramHamo\Mvc\Controllers;
use AramHamo\MvcCore\View;
use AramHamo\MvcCore\Middleware;
use AramHamo\MvcCore\DB;
use AramHamo\Mvc\Models\Chat as chatmodel;

class Chat{
  public function get(){
    $db = new DB;
    $m = new Middleware;
    $m->middleware("auth");
    $chat = new chatmodel;
    $contactsSTMT = $db->conn->prepare("SELECT distinct to_user,from_user from chat where to_user=? or from_user=? ;");
    $contactsSTMT->execute([userdata[0]["username"],userdata[0]["username"]]);
    $contacts = $contactsSTMT->fetchAll();
    $contactsList = [];
    foreach($contacts as $contact){
      if($contact["to_user"] !== userdata[0]["username"]){
        if(!in_array($contact["to_user"],$contactsList)){
          $contactsList[] = $contact["to_user"];
        }
      }else{
        if(!in_array($contact["from_user"],$contactsList)){
          $contactsList[] = $contact["from_user"];
        }
      }
    }

    return View::render("chat",array("title"=>"chat","contactsList"=>$contactsList));
  }
  public function post(){
  }
  public function update(){
  }
  public function delete(){
  }
}
