<?php
include "config.php";

$result = mysqli_query($conn,"SELECT * FROM rendezvous ORDER BY id DESC");

while($row = mysqli_fetch_assoc($result)){
    echo "<h3>".$row['name']."</h3>";
    echo $row['email']."<br>";
    echo $row['tel']."<br>";
    echo $row['message']."<hr>";
}
?>