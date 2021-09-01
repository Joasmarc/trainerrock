<?php

require("../models/users.php");

$users = new users();

var_dump($users->countAll());

?>