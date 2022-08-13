<?php
header("Access-Control-Allow-Origin: http://127.0.0.7:5500");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
require_once("./routes/api.php");