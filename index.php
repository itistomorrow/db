<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="kr">
	<head>
		<meta charset="euc-kr">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>template</title>
		<meta name="description" content="">
		<meta name="author" content="DaHam">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

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
		<div>
			<header>
				<h2 class="lead" align="center"> 2013년도 2학기 데이터베이스 모의 수강 시스템 </h2>
			</header>
			<div class="row">

				<div class="container col-md-4 col-md-offset-4 ">
					<div class="jumbotron" >

						<form role="form" NAME=LOGIN METHOD=POST ACTION="login.php">

							<div class="form-group">
								<label for="exampleInputID1">ID</label>
								<input type="id" class="form-control" placeholder="Enter ID" name="id">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" placeholder="Enter Password" name ="passwd">
							</div>
							<div class="form-group">
								<div class=".col-xs-6 .col-md-4">
									<button type="submit" class="btn btn-default" name="btn1">
										Log in
									</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
			<footer></footer>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
