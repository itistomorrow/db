<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";

if (!$_POST[passwd]) {
	echo("
		<script language=javascript> alert(\"11.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[email]) {
	echo("
		<script language=javascript> alert(\"222.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[phone_num]) {
	echo("
		<script language=javascript> alert(\"4444해주세요.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[registdate]) {
	echo("
		<script language=javascript> alert(\"please input regi.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[peoplenumber]) {
	echo("
		<script language=javascript> alert(\"please input peoplenumber.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[name]) {
	echo("
		<script language=javascript> alert(\"please input name.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[number]) {
	echo("
		<script language=javascript> alert(\"input student number \");history.go(-1);</script>");
	exit ;
}

//$query = "insert into 학과구성원 values($_POST[number],$_POST[name],$_POST[peoplenumber], $_POST[phone_num], $_POST[email], $_POST[passwd], $_POST[registdate], '학생', 1 )";
$query = "insert into 구성원정보 values($_POST[number],'$_POST[name]','$_POST[peoplenumber]','$_POST[phone_num]','$_POST[email]', '$_POST[passwd]','$_POST[registdate]', '학생', 1 )";
$result = oci_parse($connect, $query);
oci_execute($result);

echo("	<script language=javascript> alert(\"1111\"); </script>");
echo("<meta http-equiv='Refresh' content='0; URL=ass_student_insert.html'>");
?>