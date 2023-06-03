<?php declare(strict_types=1);
namespace AramHamo\Mvc\Models;
use AramHamo\MvcCore\Model;

define('tableName','chat');

class User extends Model{
  public int $from_user;
  public int $to_user;
  public int $time;
  public String $message;
}
