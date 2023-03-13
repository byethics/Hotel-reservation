<?php
session_start();
session_destroy();
header("Location: /Hotel-reservation/pages/login.php");
