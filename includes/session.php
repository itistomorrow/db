<?php
@session_start();

if(!$_SESSION[ss_sid]){
	echo('���ǿ���');
	echo ("<script language=javascript>
		alert(\"session error\");
		history.go(-1);
		</script>");
	exit;
}

?>