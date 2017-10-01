<?php

require 'connections/core.inc.php';
session_destroy();
header('Location:'.'index.php');
?>
