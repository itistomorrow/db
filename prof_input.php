<meta charset="euc-kr">
<?php
include "includes/DBaccess.php";
include "includes/session.php";
$count_stu = 0;
$count_sco = 0;

if( 100 < $_POST[s_mid] | 100 < $_POST[s_fin]){
	echo ("<script language=\"javascript\"> alert(\"������ '100'���� �۾ƾ� �մϴ�.\");</script>");
}
else if(!is_numeric($_POST[s_mid]) || !is_numeric($_POST[s_fin])){
	echo ("<script language=\"javascript\"> alert(\"���� ������ �Է��ؾ� �մϴ�.\");</script>");
}
else{
	$data = oci_parse($connect, "UPDATE ���� SET  �������� = '$_POST[homework]',�߰����� = '$_POST[s_mid]', �⸻���� = '$_POST[s_fin]', ���� = '$_POST[s_score]' WHERE ��������ȣ = '$_POST[s_id]' AND �����ȣ = '$_SESSION[subject_num]' ");
	oci_execute($data);

	echo ("<script language=\"javascript\"> alert(\"Done!!\");</script>");

}


echo("<meta http-equiv='Refresh' content='0; URL=prof_input.html'>");
?>