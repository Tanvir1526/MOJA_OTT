<h5>{{Session::get('msg')}}</h5>
@if(session()->has('jsAlert'))
    <script>
        alert({{ session()->get('jsAlert') }});
    </script>
@endif 
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
	<link rel="icon" type="../../image/png" href="../../icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="../../icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../../icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../../icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../../icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>MOJA – Online Movies, TV Shows & Cinema</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="../../img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="{{route('users.login.submit')}}" method="post" class="sign__form">
						{{@csrf_field()}}

							<div class="sign__group">
							<input type="text" class="sign__input" value="{{old('email')}}" name="email" placeholder="Email"><br>
								@error('email')
        						<span class="text-danger" >{{$message}}</span><br>
								@enderror
							</div>

							<div class="sign__group">
							<input type="password" class="sign__input"  name="password" placeholder="Password"><br>
								@error('password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>

							
							
							<input type="submit" class="sign__btn" value="Sign in">	

							<span class="sign__text">Don't have an account? <a href="{{Route('register')}}">Sign up!</a></span>

							<!--<span class="sign__text"><a href="#">Forgot password?</a></span>-->
						</form>
						<!-- end authorization form -->
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
	<script>
		(function (window, document) {
			var loader = function () {
				var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
				script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
				tag.parentNode.insertBefore(script, tag);
			};
	
			window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
		})(window, document);
	</script>
</body>

</html>