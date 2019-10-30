<?php
require "../models/userModel.php";
$users = getAllUser();
require "../views/htmlUsers.php";
