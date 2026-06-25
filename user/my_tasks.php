<?php

include("../auth.php");
include("../db.php");

$user_id=$_SESSION['user_id'];

$sql="SELECT *
FROM tasks
WHERE user_id='$user_id'
ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>My Tasks</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>My Tasks</h2>

<table>

<tr>

<th>Title</th>
<th>Status</th>
<th>Budget</th>
<th>Chat</th>
<th>Rating</th>

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
$<?php echo $row['budget']; ?>
</td>

<td>

<a
class="btn"
href="../chat.php?task_id=<?php echo $row['id']; ?>">

Chat

</a>

</td>

<td>

<?php

if(
$row['status']=="Completed"
&&
$row['helper_id']!=NULL
){

?>

<a
class="btn"
href="../rate_helper.php?task_id=<?php echo $row['id']; ?>&helper_id=<?php echo $row['helper_id']; ?>">

Rate Helper

</a>

<?php

}else{

echo "-";

}

?>

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