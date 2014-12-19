
  <?
include "includes/DBaccess.php";
include "includes/session.php";


if(!$_POST[subjectNum] ) {
	echo ("
		<script language=javascript> alert(\"교과목번호를 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[classNum])) {
	echo ("
		<script language=javascript> alert(\"과목분반을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[idNum])) {
	echo ("
		<script language=javascript> alert(\"구성원번호를 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectName])) {
	echo ("
		<script language=javascript> alert(\"과목이름을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectGrade])) {
	echo ("
		<script language=javascript> alert(\"과목수강학년을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectTerm])) {
	echo ("
		<script language=javascript> alert(\"과목수강학기을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;	
}else if(!($_POST[subjectScore])) {
	echo ("
		<script language=javascript> alert(\"과목부여학점을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectVarify])) {
	echo ("
		<script language=javascript> alert(\"과목구분을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectMax])) {
	echo ("
		<script language=javascript> alert(\"수강가능인원을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[classroomNum])) {
	echo ("
		<script language=javascript> alert(\"강의실번호를 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectStart])) {
	echo ("
		<script language=javascript> alert(\"배정시작일시를 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectEnd])) {
	echo ("
		<script language=javascript> alert(\"배정종료일시를 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else if(!($_POST[subjectDay])) {
	echo ("
		<script language=javascript> alert(\"배정요일을 꼭 입력해주세요.\");history.go(-1);</script>");
	exit;
}else{


	$data = oci_parse($connect,"insert into 과목 values('$_POST[subjectNum]', '$_POST[subjectName]', '$_POST[subjectGrade]','$_POST[subjectTerm]', '$_POST[subjectScore]', '$_POST[subjectVarify]')");
	oci_execute($data);
	$data1 = oci_parse($connect,"insert into 분반편성 values('$_POST[subjectNum]', '$_POST[classNum]')");
	oci_execute($data1);
	$data2 = oci_parse($connect,"insert into 강의정보 values('$_POST[subjectNum]', '$_POST[classNum]', '$_POST[subjectStart]', '$_POST[subjectEnd]', '$_POST[subjectDay]')");
	oci_execute($data2);
	$data3 = oci_parse($connect,"insert into 강의실 values('$_POST[subjectNum]', '$_POST[classNum]', '$_POST[classroomNum]')");
	oci_execute($data3);
	$data4 = oci_parse($connect,"insert into 수업편성 values('$_POST[subjectNum]', '$_POST[classNum]', '$_POST[idNum]', '$_POST[subjectMax]')");
	oci_execute($data4);
}



echo ("	<script language=javascript> alert(\"성공적으로 정보를 삽입하였습니다.\"); </script>");
echo("<meta http-equiv='Refresh' content='0; URL=a_class_insert.html'>");

?>
