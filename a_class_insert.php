
  <?
include "includes/DBaccess.php";
include "includes/session.php";


if(!$_POST[subjectNum] ) {
	echo ("
		<script language=javascript> alert(\"�������ȣ�� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[classNum])) {
	echo ("
		<script language=javascript> alert(\"����й��� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[idNum])) {
	echo ("
		<script language=javascript> alert(\"��������ȣ�� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectName])) {
	echo ("
		<script language=javascript> alert(\"�����̸��� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectGrade])) {
	echo ("
		<script language=javascript> alert(\"��������г��� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectTerm])) {
	echo ("
		<script language=javascript> alert(\"��������б��� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;	
}else if(!($_POST[subjectScore])) {
	echo ("
		<script language=javascript> alert(\"����ο������� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectVarify])) {
	echo ("
		<script language=javascript> alert(\"���񱸺��� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectMax])) {
	echo ("
		<script language=javascript> alert(\"���������ο��� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[classroomNum])) {
	echo ("
		<script language=javascript> alert(\"���ǽǹ�ȣ�� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectStart])) {
	echo ("
		<script language=javascript> alert(\"���������Ͻø� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectEnd])) {
	echo ("
		<script language=javascript> alert(\"���������Ͻø� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectDay])) {
	echo ("
		<script language=javascript> alert(\"���������� �� �Է����ּ���.\");history.go(-1);</script>");
	exit;
}else{


	$data = oci_parse($connect,"insert into ���� values('$_POST[subjectNum]', '$_POST[subjectName]', '$_POST[subjectGrade]','$_POST[subjectTerm]', '$_POST[subjectScore]', '$_POST[subjectVarify]')");
	oci_execute($data);
	$data1 = oci_parse($connect,"insert into �й��� values('$_POST[subjectNum]', '$_POST[classNum]')");
	oci_execute($data1);
	$data2 = oci_parse($connect,"insert into �������� values('$_POST[subjectNum]', '$_POST[classNum]', '$_POST[subjectStart]', '$_POST[subjectEnd]', '$_POST[subjectDay]')");
	oci_execute($data2);
	$data3 = oci_parse($connect,"insert into ���ǽ� values('$_POST[subjectNum]', '$_POST[classNum]', '$_POST[classroomNum]')");
	oci_execute($data3);
	$data4 = oci_parse($connect,"insert into ������ values('$_POST[subjectNum]', '$_POST[classNum]', '$_POST[idNum]', '$_POST[subjectMax]')");
	oci_execute($data4);
}



echo ("	<script language=javascript> alert(\"���������� ������ �����Ͽ����ϴ�.\"); </script>");
echo("<meta http-equiv='Refresh' content='0; URL=a_class_insert.html'>");

?>
