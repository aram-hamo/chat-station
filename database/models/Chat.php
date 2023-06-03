<?php declare(strict_types=1);
namespace AramHamo\Mvc\Models;
use AramHamo\MvcCore\Model;

class Chat extends Model{
  public String $_tableName = "chat";
  public String $from_user;
  public String $to_user;
  public int $time;
  public String $message;
}
