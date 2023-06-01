<!DOCTYPE html>
<html lang=en>
<head>
    <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>
  <title><?= self::viewData()['title'] ?></title>
  <form id=registerForm method="post">
    <input placeholder="First Name" name="firstName" >
    <input placeholder="Last Name" name="lastName" >
    <input placeholder="Username" name="username" >
    <input placeholder="Password" name="password" type="password">
    <input placeholder="E-Mail" name="email" type="email">
    <input name="register" type="submit" value="Register">
  </form>
<script>
</script>
</body>
</html>
