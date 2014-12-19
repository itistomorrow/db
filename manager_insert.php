<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";

if (!$_POST[passwd]) {
	echo("
		<script language=javascript> alert(\"Pleas Insert Password!!!.\");history.go(-1);</script>");
	exit ;
} else if (!($_POST[job] == '조교' or $_POST[job] == '교수')) {
	echo("
		<script language=javascript> alert(\"Please Insert Role.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[email]) {
	echo("
		<script language=javascript> alert(\"email을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[phone_num]) {
	echo("
		<script language=javascript> alert(\"Pleas Insert Phone-Number.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[registdate]) {
	echo("
		<script language=javascript> alert(\"Pleas Insert Regist Date.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[peoplenumber]) {
	echo("
		<script language=javascript> alert(\"Pleas Insert peoplenumber .\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[name]) {
	echo("
		<script language=javascript> alert(\"Pleas Insert Name.\");history.go(-1);</script>");
	exit ;
} else if (!$_POST[number]) {
	echo("
		<script language=javascript> alert(\"Pleas Insert Member Number.\");history.go(-1);</script>");
	exit ;
} else {
	$data = oci_parse($connect, "insert into 구성원정보 values('$_POST[number]', '$_POST[name]', '$_POST[peoplenumber]', '$_POST[phone_num]', '$_POST[email]', '$_POST[passwd]', '$_POST[registdate]', '$_POST[job]', '')");
	oci_execute($data);
}

echo("	<script language=javascript> alert(\"성공적으로 정보를 삽입하였습니다.\"); </script>");
echo("<meta http-equiv='Refresh' content='0; URL=manager_insert.html'>");
?>
