<?
include "includes/DBaccess.php";
include "includes/session.php";

$num = $_POST[subject_num];
$place = $_POST[subject_placement];
echo $num;
echo $place;

$delete_query ="delete from ���� where ��������ȣ = '$_SESSION[ss_id]' and �����ȣ ='$_POST[subject_num]' and ����й� = '$_POST[subject_placement]' and �����⵵='2013' and �����б�=02";
$result_delete = oci_parse($connect,$delete_query);        
oci_execute($result_delete);

echo ("
		<script language=javascript>
		alert(\"Delet Complete!!\");
		</script>");
echo("<meta http-equiv='Refresh' content='0; URL=stu_register.html'>");
?>

