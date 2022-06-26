<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="../../css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="../../css/nouislider.min.css">
	<link rel="stylesheet" href="../../css/ionicons.min.css">
	<link rel="stylesheet" href="../../css/plyr.css">
	<link rel="stylesheet" href="../../css/photoswipe.css">
	<link rel="stylesheet" href="../../css/default-skin.css">
	<link rel="stylesheet" href="../../css/main.css">
	

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="../../icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="../../icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../../icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../../icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../../icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Moja – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="{{route('users.reg.submit')}}" method="post" class="sign__form">
							<!--<a href="#" class="sign__logo">
								<img src="../../img/logo.svg" alt="">
							</a>-->
							{{@csrf_field()}}

							<div class="sign__group">
								<input type="text" class="sign__input" value="{{old('name')}}" name="name" placeholder="Name"><br>
								@error('name')
        						<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" value="{{old('email')}}" name="email" placeholder="Email"><br>
								@error('email')
        						<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" value = "{{old('password')}}" name="password" placeholder="Password"><br>
								@error('password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" value = "{{old('conf_password')}}" name="conf_password" placeholder="Confirm Password"><br>
								@error('conf_password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>
							<div class="sign__group">
							Type : <select name="type" id="type">
								
								<option value="admin">Admin</option>
								<option value="production">Production House</option>
								<option value="premium">Premium Subscriber</option>
								<option value="free">Free Subscriber</option>
							</select>
							@error('type')
        					<span class="text-danger">{{$message}}</span><br>
							@enderror
							</div>
							<input type="submit" class="sign__btn" value="Sign Up">							
							

							<span class="sign__text">Already have an account? <a href="{{Route('login')}}">Sign in!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/bootstrap.bundle.min.js"></script>
	<script src="../../js/owl.carousel.min.js"></script>
	<script src="../../js/jquery.mousewheel.min.js"></script>
	<script src="../../js/jquery.mCustomScrollbar.min.js"></script>
	<script src="../../js/wNumb.js"></script>
	<script src="../../js/nouislider.min.js"></script>
	<script src="../../js/plyr.min.js"></script>
	<script src="../../js/jquery.morelines.min.js"></script>
	<script src="../../js/photoswipe.min.js"></script>
	<script src="../../js/photoswipe-ui-default.min.js"></script>
	<script src="../../js/main.js"></script>
</body>

</html>