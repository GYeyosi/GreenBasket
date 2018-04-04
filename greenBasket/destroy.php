<?php
session_start();

header('Location: ' . $_SERVER['HTTP_REFERER']);
session_destroy();
?>