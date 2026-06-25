<?php

include("../auth.php");
include("../db.php");


// DELETE USER

if(isset($_GET['delete'])){

$id=$_GET['delete'];


// jangan hapus admin

$check=mysqli_query(
$conn,
"SELECT role FROM users WHERE id='$id'"
);

$user=mysqli_fetch_assoc($check);


if($user['role']!="admin"){


mysqli_query(
$conn,
"DELETE FROM users
WHERE id='$id'"
);


}


header("Location: manage_users.php");

}



$result=mysqli_query(
$conn,
"SELECT *
FROM users
ORDER BY id DESC"
);


?>


<!DOCTYPE html>
<html>

<head>

<title>
Manage Users
</title>


<link rel="stylesheet"
href="../css/style.css">


</head>


<body>


<div class="container">


<div class="card">


<h2>
Manage Users
</h2>



<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Role</th>

<th>Action</th>


</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['fullname']; ?>

</td>



<td>

<?php echo $row['email']; ?>

</td>



<td>

<?php echo $row['role']; ?>

</td>



<td>


<?php

if($row['role']!="admin"){

?>


<a
class="btn"
onclick="return confirm('Delete this user?')"
href="manage_users.php?delete=<?php echo $row['id']; ?>">

Delete

</a>


<?php

}else{

echo "Admin";

}

?>


</td>



</tr>


<?php } ?>



</table>



<br>


<a class="btn"
href="dashboard.php">

Back

</a>



</div>


</div>



</body>

</html>