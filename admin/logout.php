<?php
include "db/config.php";

session_start();
session_unset();
session_destroy();

header("Location:/news-template/admin/");
