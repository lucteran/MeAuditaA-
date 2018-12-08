<?php
 
require_once 'conf.php';
 
if (!isLoggedIn())
{
    header('Location: index.php');
}

?>