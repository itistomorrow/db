<?php
include_once "includes/DBaccess.php";
include_once "includes/session.php";

$ids = $_SESSION["ss_id"];
$result = oci_parse($connect, "SELECT * FROM ���������� where ��������ȣ ='$ids'");
oci_execute($result);
$data = oci_fetch_array($result);
?>


<html>
	<head>

		<meta http-equiv="content-type" content="text/html; charset=euc-kr">
		<script language="JavaScript">
			function mem_list() {
				window.location.replace("manager_main.php");

			}

			function mem_insert() {
				window.location.replace("manager_insert.html");
			}

			function addRow(var2, var3, var4, var5, var6, var7) {
				if (!var2)
					var2 = "��";
				if (!var3)
					var3 = "��";
				if (!var4)
					var4 = "��";
				if (!var5)
					var5 = "��";
				if (!var6)
					var6 = "��";
				if (!var7)
					var7 = "��";

				var tbody = document.getElementById("output_table").getElementsByTagName("TBODY")[0];
				var row = document.createElement("TR");

				var td2 = document.createElement("TD");
				td2body = "<p align='center'>" + var2 + "</p>";
				td2.insertAdjacentHTML('beforeEnd', td2body);

				var td3 = document.createElement("TD");
				td3body = "<p align='center'>" + var3 + "</p>";
				td3.insertAdjacentHTML('beforeEnd', td3body);

				var td4 = document.createElement("TD");
				td4body = "<p align='center'>" + var4 + "</p>";
				td4.insertAdjacentHTML('beforeEnd', td4body);

				var td5 = document.createElement("TD");
				td5body = "<p align='center'>" + var5 + "</p>";
				td5.insertAdjacentHTML('beforeEnd', td5body);

				var td6 = document.createElement("TD");
				td6body = "<p align='center'>" + var6 + "</p>";
				td6.insertAdjacentHTML('beforeEnd', td6body);

				var td7 = document.createElement("TD");
				td7body = "<p align='center'>" + var7 + "</p>";
				td7.insertAdjacentHTML('beforeEnd', td7body);

				row.appendChild(td2);
				row.appendChild(td3);
				row.appendChild(td4);
				row.appendChild(td5);
				row.appendChild(td6);
				row.appendChild(td7);
				tbody.appendChild(row);

			}

		</script>
		</style>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<input type="submit" name="btn1" onClick="mem_list()" value="list member">
		&nbsp;
		<input type="submit" name="btn1" onClick="mem_insert()" value="insert member">
		<?php echo $data["�̸�"] ?> <?php echo $data["����������"]?> 
		<a href="Logout.php">
			<input type="submit" name="btn1" value="Logout">
		</a>
		<div class="row">
			<div class="col-md-8 col-sm-10">
				<div class="table-responsive">

					<!-- Table -->

					<table  class="table table-striped table-condensed table-striped table-hover" id = "output_table" align="center">

						<tbody>
							<tr>
								<td>
								<p align="center">
									����������
								</p></td>
								<td>
								<p align="center">
									��������ȣ
								</p></td>
								<td>
								<p align="center">
									�̸�
								</p></td>
								<td>
								<p align="center">
									�������
								</p></td>
								<td>
								<p align="center">
									����ó
								</p></td>
								<td>
								<p align="center">
									e-mail
								</p></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php
$data1 =oci_parse($connect,"select ��������ȣ, ����������, �̸�, �������, ����ó, �̸��� from ���������� where ���������� = '����' or ���������� = '����'");
oci_execute($data1);

while($result1 = oci_fetch_array($data1)) {

echo ("<script language=javascript>addRow(\"$result1[����������]\", \"$result1[��������ȣ]\", \"$result1[�̸�]\", \"$result1[�������]\", \"$result1[����ó]\", \"$result1[�̸���]\");</script>");

}
		?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
