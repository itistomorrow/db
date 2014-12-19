<meta charset="euc-kr">
<?php
include "includes/DBaccess.php";
include "includes/session.php";
$count_stu = 0;
$count_sco = 0;

if( 100 < $_POST[s_mid] | 100 < $_POST[s_fin]){
	echo ("<script language=\"javascript\"> alert(\"점수가 '100'보다 작아야 합니다.\");</script>");
}
else if(!is_numeric($_POST[s_mid]) || !is_numeric($_POST[s_fin])){
	echo ("<script language=\"javascript\"> alert(\"양의 정수를 입력해야 합니다.\");</script>");
}
else{
	$data = oci_parse($connect, "UPDATE 수강 SET  과제점수 = '$_POST[homework]',중간점수 = '$_POST[s_mid]', 기말점수 = '$_POST[s_fin]', 학점 = '$_POST[s_score]' WHERE 구성원번호 = '$_POST[s_id]' AND 과목번호 = '$_SESSION[subject_num]' ");
	oci_execute($data);

	echo ("<script language=\"javascript\"> alert(\"Done!!\");</script>");

}


echo("<meta http-equiv='Refresh' content='0; URL=prof_input.html'>");
?>