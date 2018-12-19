<?php
 
require_once 'conf.php';
 
if (!logado())
{
    header('Location: ../index.php');
}

?>