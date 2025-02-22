<?php
$dbc = mysqli_connect("localhost", "root", "schachner", "rudolph");
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
}
?>
