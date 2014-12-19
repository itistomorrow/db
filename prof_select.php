<?php
include "includes/DBaccess.php";
include "includes/session.php";
	
$_SESSION[subject_num] = $_POST[subject_num];
$_SESSION[class_num] = $_POST[class_num];

echo("<script languege=\"javascript\"> alert(\"'$_SESSION[subject_num]' '$_SESSION[class_num]'분반을 선택하셨습니다.\");</script>");
echo("<meta http-equiv='Refresh' content='0; URL=prof_select.html'>");
?>