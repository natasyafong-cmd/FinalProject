<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Login</h2>

<form action="login_process.php"
method="POST">

<label>Email</label>

<input
type="email"
name="email"
required>

<label>Password</label>

<input
type="password"
name="password"
required>

<button
class="btn"
type="submit">

Login

</button>

</form>

<br>

<a href="register.php">

Create Account

</a>

</div>

</div>

</body>
</html>