<?php

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$link = $host.$url;

echo $host;
echo "<br>";
echo $url;
echo "<br>";
echo $link;
echo "<br>";

echo "<a href='http://$link'>Link de host</a>";
?>