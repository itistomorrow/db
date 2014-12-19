<meta charset="euc-kr">
<?
include "includes/DBaccess.php";
include "includes/session.php";

if(!$_POST[subject])
{
echo ("
		<script language=javascript>
		alert(\"과목번호를 입력하지 않았습니다. 다시 입력하여주세요.\");
		history.go(-1);
		</script>");
		exit;
}
if(!$_POST[placement])
{
echo ("
		<script language=javascript>
		alert(\"분반을 입력하지 않았습니다. 다시 입력하여주세요.\");
		history.go(-1);
		</script>");
		exit;
}

/////편람 되어 있냐????
$sql_subject = "select a.과목번호,a.과목분반, b.시작시간, b.강의요일 from 수업편성 a, 강의정보 b where a.과목번호 = '$_POST[subject]' and a.과목분반 = '$_POST[placement]' and a.과목번호 = b.과목번호 and a.과목분반 = b.과목분반";
$result_subject = oci_parse($connect,$sql_subject);
oci_execute($result_subject);
$row_subject = oci_fetch_array($result_subject, OCI_ASSOC);
/////18학점 초과 못하게 하는것////

$sql_subnum = "select count(과목번호) as 과목수 from 수강 where 구성원번호 = '$_SESSION[ss_id]' and 학점 is null"; 
$result_subnum = oci_parse($connect,$sql_subnum);
oci_execute($result_subnum);
$row_subnum = oci_fetch_array($result_subnum, OCI_ASSOC);
///////이미 수강된 과목이다.
$sql_exist = "select 과목번호 from 수강 where 구성원번호 = '$_SESSION[ss_id]'";
$result_exist = oci_parse($connect,$sql_exist);
oci_execute($result_exist);
/////////수강인원초과
$sql_curnum = "select count(구성원번호) from 수강 where 과목번호 = '$_POST[subject]' and 과목분반 = '$_POST[placement]' and 수강년도 ='2013' and 수강학기 ='02'";
$result_curnum = oci_parse($connect,$sql_curnum);
oci_execute($result_curnum);
$row_curnum = oci_fetch_array($result_curnum, OCI_ASSOC);
///////////////////////////수강인원 불러 오기
$sql_maxnum = "select 수강인원 from 수업편성 where 과목번호 ='$_POST[subject]' and 과목분반 = '$_POST[placement]'";
$result_maxnum = oci_parse($connect,$sql_maxnum);
oci_execute($result_maxnum);
$row_maxnum = oci_fetch_array($result_maxnum, OCI_ASSOC);
///////////////////

$sql_mysub = "select 강의정보.시작시간, 강의정보.강의요일 from 수강, 강의정보 where 수강.구성원번호 = '$_SESSION[ss_id]' and 수강.과목번호 = 강의정보.과목번호 and 수강.과목분반 = 강의정보.과목분반";
$result_mysub = oci_parse($connect,$sql_mysub);
oci_execute($result_mysub);

if(!$row_subject[과목번호] && !$row_subject[과목분반]) {
	echo ("
		<script language=javascript>
		alert(\"0\");
		history.go(-1);
		</script>");
		exit;
}

while($row_exist = oci_fetch_array($result_exist)) {
	if($row_exist[과목번호] == $_POST[subject]) {
		echo ("
				<script language=javascript>
				alert(\"Overlap register!!\");
				history.go(-1);
				</script>");
				exit;
	}
}
$num = 3;
if((($row_subnum[과목수])*$num) > 18) 

{
 $row_subnum[과목수] = $row_subnum[과목수]-1;
	echo ("
		<script language=javascript>
		alert(\"excess Maximum register grade!!\");
		history.go(-1);
		</script>");
		exit;
}

if(($row_curnum[구성원번호]+1) > $row_maxnum[수강인원])
{
	echo ("
		<script language=javascript>
		alert(\"excess Maximum register number!!\");
		history.go(-1);
		</script>");
		exit;
}

//while($row_mysub = oci_fetch_array($result_mysub)) {
	if($row_subject[시작시간] == $row_mysub[시작시간] && $row_subject[강의요일] == $row_mysub[강의요일]){
		echo ("
			<script language=javascript>
			alert(\"Overlap time!!\");
			history.go(-1);
			</script>");
			exit;
	}
//}
if($row_subject[과목번호]) {
			$sql_get_level="select 학년 from 구성원정보 where 구성원번호 ='$_SESSION[ss_id]'";
			$result_get_level = oci_parse($connect,$sql_get_level);
			oci_execute($result_get_level);
			$row_get_level = oci_fetch_array($result_get_level,OCI_ASSOC);
			$level = $row_get_level[학년];
			echo $level;
			$sql_class = "insert into 수강(구성원번호, 과목번호, 과목분반, 수강년도, 수강학기, 수강학년) values ('$_SESSION[ss_id]', '$_POST[subject]', '$_POST[placement]', '2013', 2, $level)";
			$result_get_class = oci_parse($connect,$sql_class);
			oci_execute($result_get_class);
			echo("
				<script language=javascript>
				alert(\"Insert complete.\");
				</script>");
}

echo("<meta http-equiv='Refresh' content='0; URL=stu_register.html'>");
?>