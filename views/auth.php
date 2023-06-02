<!DOCTYPE html>
<html lang=en>
<head>
<?php
include "../templates/header.php";
?>
</head>
<body>
  <title><?= self::viewData()['title'] ?></title>
  <dialog id="dialog" open>
    <form id=registerForm method="post">
      <input placeholder="First Name" name="firstName" ><br>
      <input placeholder="Last Name" name="lastName" ><br>
      <input placeholder="Username" name="username" ><br>
      <input placeholder="Password" name="password" type="password" minlength="8" ><br>
      <input placeholder="E-Mail" name="email" type="email"><br>
      <input name="register" type="submit" value="Register">
    </form>
  </dialog>
<script>
</script>
</body>
</html>
