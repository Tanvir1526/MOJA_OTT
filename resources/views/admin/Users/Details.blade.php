@extends('admin.layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic need -->
    <title>Moja – Online Movies, TV Shows & Cinema HTML Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- CSS files -->
    <link rel="stylesheet" href="../../css/plugins.css">
    <link rel="stylesheet" href="../../css/style.css">
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
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

</head>

<body>

    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{ $users->name }}’s profile</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="page-single">
            <div class="container">
                <div class="row ipad-width">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="user-information">
                            <div class="user-img">
                                <a href="#"><img src="{{asset('pro_images/' . $users->pro_pic)}}" width=150 height=100
                                        alt=""><br></a>

                            </div>
                            <div class="user-fav">
                                <p>Account Details</p>
                                <ul>
                                    @if($users->type === 'premium'){
                                    <li class="active"><a href="">Profile</a></li>
                                    <li><a href="{{route('premium.mylist')}}">My List</a></li>
                                    <li><a href="#">Payment History</a></li>}
                                    @elseif($users->type === 'production'){
                                    <li class="active"><a href="">Profile</a></li>
                                    <li><a href="{{route('premium.mylist')}}">My Content List</a></li>
                                    <li><a href="#">Payment History</a></li>}
                                    @endif

                                </ul>
                            </div>
                            <div class="user-fav">
                                <p>Others</p>
                                <ul>

                                    <li><a href="#">Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="form-style-1 user-pro" action="#">
                            <form action="{{route('users.update.submit')}}" method="post" class="user"
                                enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <h4>01. Profile details</h4>
                                <div class="row">
                                    <div class="col-md-6 form-it">
                                        <label>Name</label>
                                        <input type="text" value="{{old('name')}}" name="name" value="{{$users->name}}"
                                            placeholder="{{$users->name}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-it">
                                        <label>Email Address</label>
                                        <input type="text" value="{{old('email')}}" name="email"
                                            value="{{$users->email}}" placeholder="{{$users->email}}">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-it">

                                        <label for="User Type" class=> User Type: {{$users->type}}</label>

                                    </div>

                                </div>

                                <div class="row">
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/plugins.js"></script>
    <script src="../../js/plugins2.js"></script>
    <script src="../../js/custom.js"></script>
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

\

</html>
@endsection