<?php

include("auth.php");
include("db.php");

if(isset($_POST['submit'])){

$task_id=$_POST['task_id'];

$helper_id=$_POST['helper_id'];

$rating=$_POST['rating'];

$review=$_POST['review'];

mysqli_query(
$conn,
"INSERT INTO ratings(

task_id,
helper_id,
rating,
review

)

VALUES(

'$task_id',
'$helper_id',
'$rating',
'$review'

)"
);

echo "Rating Submitted";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Rate Helper</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Rate Helper</h2>

<form method="POST">

<input
type="hidden"
name="task_id"
value="<?php echo $_GET['task_id']; ?>">

<input
type="hidden"
name="helper_id"
value="<?php echo $_GET['helper_id']; ?>">

<label>Rating</label>

<select name="rating">

<option value="5">★★★★★</option>
<option value="4">★★★★</option>
<option value="3">★★★</option>
<option value="2">★★</option>
<option value="1">★</option>

</select>

<label>Review</label>

<textarea
name="review"></textarea>

<button
class="btn"
name="submit">

Submit Rating

</button>

</form>

</div>

</div>

</body>
</html>