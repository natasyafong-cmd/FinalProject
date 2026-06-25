<?php

include("../auth.php");
include("../db.php");

$id=$_GET['id'];

$helper_id=$_SESSION['user_id'];

$sql="UPDATE tasks

SET

helper_id='$helper_id',
status='Accepted'

WHERE id='$id'";

mysqli_query($conn,$sql);

header("Location: update_status.php");

?>