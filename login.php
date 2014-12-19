<?php
include "includes/DBaccess.php";

$ids = $_POST[id];
$pass = $_POST[passwd];
$success = oci_parse($connect, "SELECT * FROM 구성원정보 WHERE 구성원번호='$ids'");
oci_execute($success);
$result = oci_fetch_array($success, OCI_ASSOC);
$flag = $result['구성원구분'];

if ($result['구성원번호'] == "") {
	echo("
		<script language=javascript>
		alert(\"아이디를 잘못 입력했습니다.\");
		history.go(-1);
		</script>");
	echo("<meta http-equiv='Refresh' content='0; URL=index.php'>");
} else if ($result['비밀번호'] != $pass) {
	echo("
		<script language=javascript>
		alert(\"비밀번호를 잘못 입력했습니다.\");
		history.go(-1);
		</script>");
	echo("<meta http-equiv='Refresh' content='0; URL=index.php'>");
} else {
	@session_start();
	$_SESSION[ss_id] = $ids;
	$_SESSION[ss_name] = $result['이름'];
	$_SESSION[ss_flag] = $flag;
	$_SESSION[ss_searchsub] = '0';
	$_SESSION[ss_tableOpt] = '1';
	$_SESSION[ss_year] = $result['등록일자'];
	$_SESSION[ss_term] = '2';

	$_SESSION[ss_sid] = session_id();

	$success = oci_parse($connect, "SELECT * FROM 구성원정보 WHERE 구성원번호='$ids'");
	oci_execute($success);
	$result = oci_fetch_array($success, OCI_ASSOC);
	$flag = $result['구성원구분'];

	if ($flag == "학생") {
		echo("<meta http-equiv='Refresh' content='0; URL=student_main.php'>");
	} else if ($flag == "교수") {
		echo("<meta http-equiv='Refresh' content='0; URL=prof_select.html'>");
	} else if ($flag == "조교") {
		echo("<meta http-equiv='Refresh' content='0; URL=ass_attend.html'>");
	} else if ($flag == "관리자") {
		echo("<meta http-equiv='Refresh' content='0; URL=manager_main.php'>");
	} else {
		echo("<meta http-equiv='Refresh' content='0; URL=index.php'>");
	}
}
?>