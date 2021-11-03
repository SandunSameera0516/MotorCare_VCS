<?php

$db = mysqli_connect('localhost', 'root', '', 'motorcare');
$results = mysqli_query($db,"SELECT * FROM booking where status='booked' ORDER BY date DESC");
$jobcrdcreatedhistory= mysqli_query($db,"SELECT * FROM jobcard ORDER BY cdate");

?>