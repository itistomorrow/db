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
		<style>
			.syntaxhighlighter.bootstrap {
				padding: 9px 14px;
				margin-bottom: 14px;
				background: #f7f7f9;
				border: 1px solid #e1e1e8;
				border-radius: 4px;
			}
			h1, h2, h3, h4, h5, h6, p, a, div, code {
				font-family: 'Malgun Gothic';
			}
			.bs-example:after {
				content: "예제";
			}
			body
			{
				padding-top: 80px;
			}
		</style>
	</head>

	<body>
		<div>
			<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
			
				<div class="container">
					
					<p class="navbar-brand text-center"> 2013년도 2학기 데이터베이스 모의 수강 시스템 </p>
					

				</div>				
			</header>
				
		
			<div class="row">

				<div class="container col-md-5 col-md-offset-1 ">
					<div class="well well-lg">

						<form role="form" NAME="LOGIN" METHOD="POST" ACTION="login.php">

							<div class="form-group">
								<label for="exampleInputID1">ID</label>
								<input type="id" class="form-control input-lg" placeholder="Enter ID" name="id">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control input-lg" placeholder="Enter Password" name ="passwd">
							</div>
							<div class="form-group">
								
									<button type="submit" class="btn btn-primary btn-lg" name="btn1">
										Log in
									</button>
								
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
