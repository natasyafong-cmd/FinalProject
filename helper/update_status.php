<?php

include("../auth.php");
include("../db.php");

$helper_id=$_SESSION['user_id'];

if(isset($_POST['update'])){

$task_id=$_POST['task_id'];

$status=$_POST['status'];

mysqli_query(
$conn,
"UPDATE tasks
SET status='$status'
WHERE id='$task_id'"
);

}

$sql="SELECT *
FROM tasks
WHERE helper_id='$helper_id'
ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>My Accepted Tasks</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>My Accepted Tasks</h2>

<table>

<tr>

<th>Title</th>
<th>Status</th>
<th>Update Status</th>
<th>Chat</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td>
<?php echo $row['title']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

<td>

<form method="POST">

<input
type="hidden"
name="task_id"
value="<?php echo $row['id']; ?>">

<select name="status">

<option value="Accepted">
Accepted
</option>

<option value="In Progress">
In Progress
</option>

<option value="Completed">
Completed
</option>

</select>

<button
class="btn"
name="update">

Update

</button>

</form>

</td>

<td>

<a
class="btn"
href="../chat.php?task_id=<?php echo $row['id']; ?>">

Chat

</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a
class="btn"
href="dashboard.php">

Back

</a>

</div>

</div>

</body>
</html>