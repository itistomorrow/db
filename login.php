<?php
include "includes/DBaccess.php";

$ids = $_POST[id];
$pass = $_POST[passwd];
$success = oci_parse($connect, "SELECT * FROM ���������� WHERE ��������ȣ='$ids'");
oci_execute($success);
$result = oci_fetch_array($success, OCI_ASSOC);
$flag = $result['����������'];

if ($result['��������ȣ'] == "") {
	echo("
		<script language=javascript>
		alert(\"���̵� �߸� �Է��߽��ϴ�.\");
		history.go(-1);
		</script>");
	echo("<meta http-equiv='Refresh' content='0; URL=index.php'>");
} else if ($result['��й�ȣ'] != $pass) {
	echo("
		<script language=javascript>
		alert(\"��й�ȣ�� �߸� �Է��߽��ϴ�.\");
		history.go(-1);
		</script>");
	echo("<meta http-equiv='Refresh' content='0; URL=index.php'>");
} else {
	@session_start();
	$_SESSION[ss_id] = $ids;
	$_SESSION[ss_name] = $result['�̸�'];
	$_SESSION[ss_flag] = $flag;
	$_SESSION[ss_searchsub] = '0';
	$_SESSION[ss_tableOpt] = '1';
	$_SESSION[ss_year] = $result['�������'];
	$_SESSION[ss_term] = '2';

	$_SESSION[ss_sid] = session_id();

	$success = oci_parse($connect, "SELECT * FROM ���������� WHERE ��������ȣ='$ids'");
	oci_execute($success);
	$result = oci_fetch_array($success, OCI_ASSOC);
	$flag = $result['����������'];

	if ($flag == "�л�") {
		echo("<meta http-equiv='Refresh' content='0; URL=student_main.php'>");
	} else if ($flag == "����") {
		echo("<meta http-equiv='Refresh' content='0; URL=prof_select.html'>");
	} else if ($flag == "����") {
		echo("<meta http-equiv='Refresh' content='0; URL=ass_attend.html'>");
	} else if ($flag == "������") {
		echo("<meta http-equiv='Refresh' content='0; URL=manager_main.php'>");
	} else {
		echo("<meta http-equiv='Refresh' content='0; URL=index.php'>");
	}
}
?>