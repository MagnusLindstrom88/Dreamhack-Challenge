<?php
session_start();
session_destroy();
//This should be changed to redirect to whatever page the script was run from.
header('location: ../index.php');