<?php

$connect = oci_connect("term", "0000", "127.0.0.1/XE");

if(!$connect){
	echo("DB ���� ����!");
/*	echo ("<script language=javascript>
		alert(\"DB ���� ����!\");
		history.go(-1);
		</script>");*/
	exit;
}

?>