<?php

include("../auth.php");
include("../db.php");

$user_id=$_SESSION['user_id'];

$query=mysqli_query(
$conn,
"SELECT * FROM users
WHERE id='$user_id'"
);

$user=mysqli_fetch_assoc($query);

$total=mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM tasks
WHERE helper_id='$user_id'"
);

$row=mysqli_fetch_assoc($total);

?>

<!DOCTYPE html>
<html>
<head>

<title>Helper Dashboard</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>
Welcome,
<?php echo $user['fullname']; ?>
</h2>

<img
src="../uploads/<?php echo $user['profile_image']; ?>"
width="120">

<p>
Accepted Tasks:
<?php echo $row['total']; ?>
</p>

<a class="btn"
href="browse_tasks.php">
Browse Tasks
</a>

<a class="btn"
href="update_status.php">
My Accepted Tasks
</a>

<a class="btn"
href="../upload_profile.php">
Upload Picture
</a>

<a class="btn"
href="../logout.php">
Logout
</a>

</div>

</div>

</body>
</html>