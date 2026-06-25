<?php

include("../auth.php");
include("../db.php");

if(isset($_POST['submit'])){

$user_id=$_SESSION['user_id'];

$title=$_POST['title'];

$description=$_POST['description'];

$budget=$_POST['budget'];

$sql="INSERT INTO tasks(

user_id,
title,
description,
budget

)

VALUES(

'$user_id',
'$title',
'$description',
'$budget'

)";

mysqli_query(
$conn,
$sql
);

header(
"Location: my_tasks.php"
);

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Post Task</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Post New Task</h2>

<form method="POST">

<label>Title</label>

<input
type="text"
name="title"
required>

<label>Description</label>

<textarea
name="description"
required></textarea>

<label>Budget</label>

<input
type="number"
name="budget"
required>

<button
class="btn"
name="submit">

Submit

</button>

</form>

</div>

</div>

</body>
</html>