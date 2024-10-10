<?php
$connect = mysqli_connect("localhost", "root", "", "json");
$sgl = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sgl);
$json_array = array();

while ($row = mysqli_fetch_assoc($result))
{
    $json_array[] = $row;
}

echo json_encode($json_array);
?>