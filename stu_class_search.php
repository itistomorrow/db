<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";


if(!$_POST[searchOpt]) {
	echo ("
		<script language=javascript>
		alert(\"�˻� ������ ������ �ּ���\");
		history.go(-1);
		</script>");
	exit;
}
else if (!$_POST[searchInput]) {
	echo ("
		<script language=javascript>
		alert(\"�˻�� �Է��� �ּ���\");
		history.go(-1);
		</script>");
	exit;
}
	
$_SESSION[ss_searchopt] = $_POST[searchOpt];
$_SESSION[ss_searchsub] = $_POST[searchInput];

echo("<meta http-equiv='Refresh' content='0; URL=stu_class_list.html'>");

?>