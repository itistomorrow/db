<?
include "includes/DBaccess.php";
include "includes/session.php";


if($_POST[tableInput1]==""){
	echo "<script language=javascript>
		alert(\"검색어를 입력해주세요\");
		history.go(-1);
		</script> ";
	exit;
}

$_SESSION[ss_tableInp1] = $_POST[tableInput1];
$_SESSION[ss_tableInp2] = $_POST[tableInput2];


echo("<meta http-equiv='Refresh' content='0; URL=ass_attend.html'>");
?>
