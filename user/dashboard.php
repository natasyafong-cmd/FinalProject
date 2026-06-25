<?php

include("../auth.php");
include("../db.php");

$user_id=$_SESSION['user_id'];

$user_query=mysqli_query(
$conn,
"SELECT * FROM users
WHERE id='$user_id'"
);

$user=mysqli_fetch_assoc(
$user_query
);

$total_task=mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM tasks
WHERE user_id='$user_id'"
);

$total=mysqli_fetch_assoc(
$total_task
);

?>

<!DOCTYPE html>
<html>
<head>

<title>User Dashboard</title>

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
Total Tasks:
<?php echo $total['total']; ?>
</p>

<a class="btn"
href="post_task.php">

Post Task

</a>

<a class="btn"
href="my_tasks.php">

My Tasks

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