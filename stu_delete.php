<?
include "includes/DBaccess.php";
include "includes/session.php";

$num = $_POST[subject_num];
$place = $_POST[subject_placement];
echo $num;
echo $place;

$delete_query ="delete from 수강 where 구성원번호 = '$_SESSION[ss_id]' and 과목번호 ='$_POST[subject_num]' and 과목분반 = '$_POST[subject_placement]' and 수강년도='2013' and 수강학기=02";
$result_delete = oci_parse($connect,$delete_query);        
oci_execute($result_delete);

echo ("
		<script language=javascript>
		alert(\"Delet Complete!!\");
		</script>");
echo("<meta http-equiv='Refresh' content='0; URL=stu_register.html'>");
?>

