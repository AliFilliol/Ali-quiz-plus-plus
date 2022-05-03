<?php   include 'data-collector.php';
        include 'header.php'; 

// Get the lists with the achieved and maximum points (listed per question).

if (isset($_SESSION['achievedPointsList'])) {
    $achievedPointsList = $_SESSION['achievedPointsList'];

}
else {
// Lands here if results.php is opened in the browser before visiting any question before.
$achievedPointsList = array();

}
if (isset($_SESSION['maxPointsList'])) {
    $maxPointsList = $_SESSION['maxPointsList'];

}
else {
// Lands here if result.php is opened in the browser before visiting any question before.
    $maxPointsList = array(); 
}

// Get total of achieved points.
$total = 0;

foreach ($maxPointsList as $key => $value) {

}

$maxTotal += $value; // same as: $maxTotal = $maxTotal + $value;


// Depending on the achieved points, set a feedback exclamation.
if ($total / $maxTotal >= 0.8){
    $exclamation = "Great";

}

else if ($total / $maxTotal >= 0.4) {
    $exlamation = "Good";
}

else {
    $exclamation = "Ups";
}

?>

<h3><?php echo $exclamation; ?>, you got <?php echo $maxTotal; ?> points!</h3>
<p class="warning"></p>

<form action="index.php" method="post">
    <input type="submit" value="Again">
    <p class="warning"></p>
</form>

<?php include "footer.php"; ?>

