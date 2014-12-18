<?php

$connect = oci_connect("term", "0000", "127.0.0.1/XE");

if(!$connect){
	echo("DB 연결 실패!");
/*	echo ("<script language=javascript>
		alert(\"DB 연결 실패!\");
		history.go(-1);
		</script>");*/
	exit;
}

?>