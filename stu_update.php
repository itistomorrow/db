<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";

echo " ";
$query = "select ��й�ȣ from ���������� where ��������ȣ='$_SESSION[ss_id]'";
$result = oci_parse($connect,$query);
oci_execute($result);
$data = oci_fetch_array($result, OCI_ASSOC);

if($_POST[now_passwd] != $data['��й�ȣ']) {
	echo ("
		<script language=javascript>alert(\"�����й�ȣ�� �ٽ� �Է����ּ���.\");
			history.go(-1);
		</script>");
	exit;
}
	
$query = "update ���������� set ����ó='$_POST[phone_num]', �̸���='$_POST[email]' where ��������ȣ='$_SESSION[ss_id]'";
$result = oci_parse($connect,$query);
oci_execute($result);

if($_POST[new_passwd]) {
	if($_POST[new_passwd] == $_POST[new_passwdCheck]) {
		$query2 = "update ���������� set ��й�ȣ='$_POST[new_passwd]' where ��������ȣ='$_SESSION[ss_id]'";
		$result =oci_parse($connect, $query2);
        oci_execute($result);

	}
	else {
		echo ("
			<script language=javascript>
			alert(\"����й�ȣ Ȯ���� ��ġ���� �ʽ��ϴ�.\");
			history.go(-1);
			</script>");
		exit;
	}
}


echo("<meta http-equiv='Refresh' content='0; URL=stu_mypage.html'>");
?>