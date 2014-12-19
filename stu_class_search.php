<?
include "includes/DBaccess.php";
include "includes/session.php";


if(!$_POST[searchOpt]) {
	echo ("
		<script language=javascript>
		alert(\"검색 범위를 선택해 주세요\");
		history.go(-1);
		</script>");
	exit;
}
else if (!$_POST[searchInput]) {
	echo ("
		<script language=javascript>
		alert(\"검색어를 입력해 주세요\");
		history.go(-1);
		</script>");
	exit;
}
	
$_SESSION[ss_searchopt] = $_POST[searchOpt];
$_SESSION[ss_searchsub] = $_POST[searchInput];

echo("<meta http-equiv='Refresh' content='0; URL=stu_class_search.html'>");

?>