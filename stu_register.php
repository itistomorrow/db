<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";

if(!$_POST[subject])
{
echo ("
		<script language=javascript>
		alert(\"�����ȣ�� �Է����� �ʾҽ��ϴ�. �ٽ� �Է��Ͽ��ּ���.\");
		history.go(-1);
		</script>");
		exit;
}
if(!$_POST[placement])
{
echo ("
		<script language=javascript>
		alert(\"�й��� �Է����� �ʾҽ��ϴ�. �ٽ� �Է��Ͽ��ּ���.\");
		history.go(-1);
		</script>");
		exit;
}

/////��� �Ǿ� �ֳ�????
$sql_subject = "select a.�����ȣ,a.����й�, b.���۽ð�, b.���ǿ��� from ������ a, �������� b where a.�����ȣ = '$_POST[subject]' and a.����й� = '$_POST[placement]' and a.�����ȣ = b.�����ȣ and a.����й� = b.����й�";
$result_subject = oci_parse($connect,$sql_subject);
oci_execute($result_subject);
$row_subject = oci_fetch_array($result_subject, OCI_ASSOC);
/////18���� �ʰ� ���ϰ� �ϴ°�////

$sql_subnum = "select count(�����ȣ) as ����� from ���� where ��������ȣ = '$_SESSION[ss_id]' and ���� is null"; 
$result_subnum = oci_parse($connect,$sql_subnum);
oci_execute($result_subnum);
$row_subnum = oci_fetch_array($result_subnum, OCI_ASSOC);
///////�̹� ������ �����̴�.
$sql_exist = "select �����ȣ from ���� where ��������ȣ = '$_SESSION[ss_id]'";
$result_exist = oci_parse($connect,$sql_exist);
oci_execute($result_exist);
/////////�����ο��ʰ�
$sql_curnum = "select count(��������ȣ) from ���� where �����ȣ = '$_POST[subject]' and ����й� = '$_POST[placement]' and �����⵵ ='2013' and �����б� ='02'";
$result_curnum = oci_parse($connect,$sql_curnum);
oci_execute($result_curnum);
$row_curnum = oci_fetch_array($result_curnum, OCI_ASSOC);
///////////////////////////�����ο� �ҷ� ����
$sql_maxnum = "select �����ο� from ������ where �����ȣ ='$_POST[subject]' and ����й� = '$_POST[placement]'";
$result_maxnum = oci_parse($connect,$sql_maxnum);
oci_execute($result_maxnum);
$row_maxnum = oci_fetch_array($result_maxnum, OCI_ASSOC);
///////////////////

$sql_mysub = "select ��������.���۽ð�, ��������.���ǿ��� from ����, �������� where ����.��������ȣ = '$_SESSION[ss_id]' and ����.�����ȣ = ��������.�����ȣ and ����.����й� = ��������.����й�";
$result_mysub = oci_parse($connect,$sql_mysub);
oci_execute($result_mysub);

if(!$row_subject[�����ȣ] && !$row_subject[����й�]) {
	echo ("
		<script language=javascript>
		alert(\"0\");
		history.go(-1);
		</script>");
		exit;
}

while($row_exist = oci_fetch_array($result_exist)) {
	if($row_exist[�����ȣ] == $_POST[subject]) {
		echo ("
				<script language=javascript>
				alert(\"Overlap register!!\");
				history.go(-1);
				</script>");
				exit;
	}
}
$num = 3;
if((($row_subnum[�����])*$num) > 18) 

{
 $row_subnum[�����] = $row_subnum[�����]-1;
	echo ("
		<script language=javascript>
		alert(\"excess Maximum register grade!!\");
		history.go(-1);
		</script>");
		exit;
}

if(($row_curnum[��������ȣ]+1) > $row_maxnum[�����ο�])
{
	echo ("
		<script language=javascript>
		alert(\"excess Maximum register number!!\");
		history.go(-1);
		</script>");
		exit;
}

//while($row_mysub = oci_fetch_array($result_mysub)) {
	if($row_subject[���۽ð�] == $row_mysub[���۽ð�] && $row_subject[���ǿ���] == $row_mysub[���ǿ���]){
		echo ("
			<script language=javascript>
			alert(\"Overlap time!!\");
			history.go(-1);
			</script>");
			exit;
	}
//}
if($row_subject[�����ȣ]) {
			$sql_get_level="select �г� from ���������� where ��������ȣ ='$_SESSION[ss_id]'";
			$result_get_level = oci_parse($connect,$sql_get_level);
			oci_execute($result_get_level);
			$row_get_level = oci_fetch_array($result_get_level,OCI_ASSOC);
			$level = $row_get_level[�г�];
			echo $level;
			$sql_class = "insert into ����(��������ȣ, �����ȣ, ����й�, �����⵵, �����б�, �����г�) values ('$_SESSION[ss_id]', '$_POST[subject]', '$_POST[placement]', '2013', 2, $level)";
			$result_get_class = oci_parse($connect,$sql_class);
			oci_execute($result_get_class);
			echo("
				<script language=javascript>
				alert(\"Insert complete.\");
				</script>");
}

echo("<meta http-equiv='Refresh' content='0; URL=stu_register.html'>");
?>