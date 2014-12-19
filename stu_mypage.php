<?
include "includes/DBaccess.php";
include "includes/session.php";

echo " ";
$query = "select 비밀번호 from 학과구성원 where 구성원번호='$_SESSION[ss_id]'";
$result = oci_parse($connect,$query);
oci_execute($result);
$data = oci_fetch_array($result, OCI_ASSOC);

if($_POST[now_passwd] != $data['비밀번호']) {
	echo ("
		<script language=javascript>
			alert(\"현재비밀번호를 다시 입력해주세요.\");
			history.go(-1);
		</script>");
	exit;
}
	
$query = "update 학과구성원 set 연락처='$_POST[phone_num]', `E-Mail`='$_POST[email]' where 학번='$_SESSION[ss_id]'";
oci_parse($query);

if($_POST[new_passwd]) {
	if($_POST[new_passwd] == $_POST[new_passwdCheck]) {
		$query2 = "update 학과구성원 set 비밀번호='$_POST[new_passwd]' where 학번='$_SESSION[ss_id]'";
		oci_parse($query2);
		echo ("<script language=javascript> alert(\"비밀번호를 수정하였습니다.\"); </script>");
	}
	else {
		echo ("
			<script language=javascript>
			alert(\"새비밀번호 확인이 일치하지 않습니다.\");
			history.go(-1);
			</script>");
		exit;
	}
}

echo ("	<script language=javascript> alert(\"성공적으로 정보를 수정하였습니다.\"); </script>");
echo("<meta http-equiv='Refresh' content='0; URL=stu_mypage.html'>");

?>