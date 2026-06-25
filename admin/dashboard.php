<?php

include("../auth.php");
include("../db.php");


// =======================
// SYSTEM STATISTICS
// =======================


// Total Users
$user_query = mysqli_query(
$conn,
"SELECT COUNT(*) AS total 
FROM users"
);

$user = mysqli_fetch_assoc($user_query);



// Total Tasks
$task_query = mysqli_query(
$conn,
"SELECT COUNT(*) AS total 
FROM tasks"
);

$task = mysqli_fetch_assoc($task_query);




// Pending Tasks
$pending_query = mysqli_query(
$conn,
"SELECT COUNT(*) AS total
FROM tasks
WHERE status='Pending'"
);

$pending = mysqli_fetch_assoc($pending_query);




// In Progress Tasks
$progress_query = mysqli_query(
$conn,
"SELECT COUNT(*) AS total
FROM tasks
WHERE status='In Progress'"
);

$progress = mysqli_fetch_assoc($progress_query);




// Completed Tasks
$complete_query = mysqli_query(
$conn,
"SELECT COUNT(*) AS total
FROM tasks
WHERE status='Completed'"
);

$complete = mysqli_fetch_assoc($complete_query);


?>


<!DOCTYPE html>
<html>

<head>

<title>
Admin Dashboard
</title>


<link rel="stylesheet"
href="../css/style.css">



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>



<body>


<div class="container">



<!-- ADMIN INFORMATION -->

<div class="card">


<h2>
Admin Dashboard
</h2>



<h3>
System Overview
</h3>



<div class="stats">


<p>
<b>Total Users:</b>

<?php echo $user['total']; ?>

</p>



<p>
<b>Total Tasks:</b>

<?php echo $task['total']; ?>

</p>



<p>
<b>Pending Tasks:</b>

<?php echo $pending['total']; ?>

</p>



<p>
<b>In Progress:</b>

<?php echo $progress['total']; ?>

</p>



<p>
<b>Completed:</b>

<?php echo $complete['total']; ?>

</p>



</div>




<br>



<a class="btn"
href="manage_users.php">

Manage Users

</a>




<a class="btn"
href="manage_tasks.php">

Manage Tasks

</a>




<a class="btn"
href="generate_report.php">

Export PDF

</a>




<a class="btn"
href="../logout.php">

Logout

</a>



</div>






<!-- CHART SECTION -->


<div class="card">


<h2>
Task Statistics
</h2>



<div style="
width:400px;
margin:auto;
">


<canvas id="taskChart"></canvas>


</div>



</div>





</div>





<script>


const ctx =
document.getElementById(
'taskChart'
);



new Chart(ctx,{


type:'pie',



data:{


labels:[


'Pending',


'In Progress',


'Completed'


],



datasets:[{


label:'Task Status',



data:[


<?php echo $pending['total']; ?>,


<?php echo $progress['total']; ?>,


<?php echo $complete['total']; ?>


]



}]



},




options:{


responsive:true,



plugins:{



legend:{


position:'bottom'


},



title:{


display:true,


text:'ErrandPal Task Status Distribution'


}



}



}



});



</script>



</body>

</html>