<?php

include("auth.php");
include("db.php");

$task_id=$_GET['task_id'];

$message_query=mysqli_query(
$conn,
"SELECT messages.*,
users.fullname

FROM messages

JOIN users

ON users.id=messages.sender_id

WHERE task_id='$task_id'

ORDER BY id ASC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Task Chat</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Task Chat</h2>

<?php

while(
$msg=mysqli_fetch_assoc($message_query)
){

?>

<p>

<b>

<?php echo $msg['fullname']; ?>

</b>

:

<?php echo $msg['message']; ?>

</p>

<hr>

<?php } ?>

<form
action="send_message.php"
method="POST">

<input
type="hidden"
name="task_id"
value="<?php echo $task_id; ?>">

<textarea
name="message"
required></textarea>

<button
class="btn">

Send

</button>

</form>

</div>

</div>

</body>
</html>