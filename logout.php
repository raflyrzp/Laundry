<?php
require_once ("class/Auth.php");
$logout = new Auth();
$logout->authLogout();
?>