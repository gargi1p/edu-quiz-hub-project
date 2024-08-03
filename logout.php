<?php
session_start();
session_destroy();
require_once("config.php");
header("location:$baseURL/login.php");