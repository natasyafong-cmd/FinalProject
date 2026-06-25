<?php

include("../auth.php");
include("../db.php");


$sql="

SELECT 

tasks.*,

users.fullname AS customer,


helper.fullname AS helper,


ratings.rating,


ratings.review



FROM tasks



LEFT JOIN users

ON tasks.user_id=users.id



LEFT JOIN users helper

ON tasks.helper_id=helper.id



LEFT JOIN ratings

ON tasks.id=ratings.task_id



ORDER BY tasks.id DESC



";


$result=mysqli_query($conn,$sql);



?>



<!DOCTYPE html>
<html>


<head>


<title>

Manage Tasks

</title>


<link rel="stylesheet"
href="../css/style.css">


</head>


<body>



<div class="container">


<div class="card">


<h2>

Manage Tasks

</h2>



<table>



<tr>


<th>ID</th>

<th>Task</th>

<th>User</th>

<th>Helper</th>

<th>Status</th>

<th>Budget</th>

<th>Rating</th>

<th>Review</th>


</tr>




<?php while($row=mysqli_fetch_assoc($result)){ ?>



<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['title']; ?>

</td>



<td>

<?php echo $row['customer']; ?>

</td>



<td>


<?php 

echo $row['helper'] ?? "Not Assigned"; 

?>


</td>



<td>

<?php echo $row['status']; ?>

</td>




<td>

$

<?php echo $row['budget']; ?>

</td>



<td>


<?php

if($row['rating']){

echo $row['rating']." / 5 ⭐";

}else{

echo "-";

}

?>


</td>



<td>


<?php


if($row['review']){


echo $row['review'];


}else{


echo "-";


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