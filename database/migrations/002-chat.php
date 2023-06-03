<?php
use AramHamo\MvcCore\Migration;
use AramHamo\MvcCore\Schema;
$GLOBALS['tableName'] = "chat";
$table = new class {
  static function up(){
    $s = new Schema;
    $m = new Migration;
    $m->id();
    $m->int("time");
    $m->text("message");
    $m->int("from_user")->foreignKey("from_user","users","id");
    $m->int("to_user")->foreignKey("to_user","users","id");

    $s->create($GLOBALS['tableName'],$m->table,$m->options);
  }
  static function down(){
    $s = new Schema;
    $s->dropIfExists($GLOBALS['tableName']);
  }
};
