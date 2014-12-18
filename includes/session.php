<?php
@session_start();

if(!$_SESSION[ss_sid]){
	echo('세션에러');
	echo ("<script language=javascript>
		alert(\"session error\");
		history.go(-1);
		</script>");
	exit;
}

?>