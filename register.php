<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<div class="card">

<h2>Create Account</h2>

<form action="register_process.php" method="POST">

<label>Full Name</label>
<input type="text" name="fullname" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Role</label>

<select name="role">

<option value="user">User</option>

<option value="helper">Helper</option>

</select>

<button class="btn" type="submit">
Register
</button>

</form>

<br>

<a href="login.php">
Already have an account?
</a>

</div>

</div>

</body>
</html>