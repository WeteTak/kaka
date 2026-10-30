<?php
session_start
$_SESSION['login'] = $_POST['login']
$_SESSION['haslo'] = $_POST['haslo']
if($login="pehapowiec" AND $haslo="nauczony"){
    header('Location: dziennik.php');
};
?>
