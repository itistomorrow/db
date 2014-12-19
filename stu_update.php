<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";

echo " ";
$query = "select 비밀번호 from 구성원정보 where 구성원번호='$_SESSION[ss_id]'";
$result = oci_parse($connect,$query);
oci_execute($result);
$data = oci_fetch_array($result, OCI_ASSOC);

if($_POST[now_passwd] != $data['비밀번호']) {
	echo ("
		<script language=javascript>alert(\"현재비밀번호를 다시 입력해주세요.\");
			history.go(-1);
		</script>");
	exit;
}
	
$query = "update 구성원정보 set 연락처='$_POST[phone_num]', 이메일='$_POST[email]' where 구성원번호='$_SESSION[ss_id]'";
$result = oci_parse($connect,$query);
oci_execute($result);

if($_POST[new_passwd]) {
	if($_POST[new_passwd] == $_POST[new_passwdCheck]) {
		$query2 = "update 구성원정보 set 비밀번호='$_POST[new_passwd]' where 구성원번호='$_SESSION[ss_id]'";
		$result =oci_parse($connect, $query2);
        oci_execute($result);

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


echo("<meta http-equiv='Refresh' content='0; URL=stu_mypage.html'>");
?>