@extends('admin.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                        <h1>{{ $user->name }}’s profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="user-information">
                        <div class="user-img">
                            <a href="#"><img src="{{asset('pro_images/' . $user->pro_pic)}}" width=150 height=100
                                    alt=""><br></a>
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
                                    <input type="text" value="{{old('name')}}" name="name" value="{{$user->name}}"
                                        placeholder="{{$user->name}}">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label>Email Address</label>
                                    <input type="text" value="{{old('email')}}" name="email" value="{{$user->email}}"
                                        placeholder="{{$user->email}}">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label>User Type : </label>
                                    <input type="text" value="{{old('email')}}" name="email" value="{{$user->type}}"
                                        placeholder="{{$user->type}}">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label>Joined :</label>
                                    <input type="text" value="{{old('phone')}}" name="phone" value="{{$user->created_at}}" placeholder="{{$user->created_at}}">
                                </div>
                            </div>
                        </form>

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

</html>

@endsection