<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";


if($_POST[tableOpt] != 1 && strcmp($_POST[tableInput], "") == 0){
	echo "<script language=javascript>
		alert(\"검색어를 입력해주세요\");
		history.go(-1);
		</script> ";
	exit;
}


$_SESSION[ss_tableOpt] = $_POST[tableOpt];
$_SESSION[ss_tableInp] = $_POST[tableInput];

echo("<meta http-equiv='Refresh' content='0; URL=stu_timetable.html'>");
?>