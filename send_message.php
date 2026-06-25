<?php

include("auth.php");
include("db.php");

$task_id=$_POST['task_id'];

$message=$_POST['message'];

$sender_id=$_SESSION['user_id'];

mysqli_query(
$conn,
"INSERT INTO messages(

task_id,
sender_id,
message

)

VALUES(

'$task_id',
'$sender_id',
'$message'

)"
);

header(
"Location: chat.php?task_id=".$task_id
);

?>