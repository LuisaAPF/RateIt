<?php
session_start();
if (isset($_SESSION["login"])) echo "logged in";
else echo "logged out";
