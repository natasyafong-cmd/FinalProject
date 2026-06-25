<?php

include("../auth.php");
include("../db.php");

$keyword="";

if(isset($_GET['keyword'])){
$keyword=$_GET['keyword'];
}

$sql="SELECT *
FROM tasks
WHERE status='Pending'
AND title LIKE '%$keyword%'
ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Browse Tasks</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="card">

<h2>Available Tasks</h2>

<form method="GET">

<input
type="text"
name="keyword"
placeholder="Search Task">

<button
class="btn">

Search

</button>

</form>

<br>

<table>

<tr>

<th>Title</th>
<th>Description</th>
<th>Budget</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td>
<?php echo $row['title']; ?>
</td>

<td>
<?php echo $row['description']; ?>
</td>

<td>
$<?php echo $row['budget']; ?>
</td>

<td>

<a
class="btn"
href="accept_task.php?id=<?php echo $row['id']; ?>">

Accept

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>