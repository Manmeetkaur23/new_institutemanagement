<?php
include('bacend practice/loginstudent.php');
$login = new loginstudent();

if(!empty($_POST['action']) && $_POST['action'] == 'adminLogin') {
	$login->adminLogin();
}
?>