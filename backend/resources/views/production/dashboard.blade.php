<!DOCTYPE html>
<html lang="en">
<head>
  <style>

</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    {{@csrf_field()}}
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MOJA</a>
    </div>
    <form method="post" action="{{route('contentreport')}}">
         {{@csrf_field()}}
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{{route('production.profile')}}">Profile</a></li>
        <li><a href="{{route('contentreport')}}">View Report</a></li>
        <li><a href="{{route('contentrating')}}">Rating View</a></li>
        <li><a href="{{route('content.about')}}">About</a></li>
        <li><a href="{{route('content.productioncontact')}}">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Login Out</a></li>
     </ul>
  </form>
     
      <ul class="nav navbar-nav navbar-right">
      <nav class="navbar navbar-light bg-light">
      <form class="form-inline" method="post" action="{{route('contentsearch')}}">
         {{@csrf_field()}}
           <input class="form-control mr-sm-2" type="search" name="SearchId" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      
      
      </ul>
      
    </div>
  </div>
</nav>

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="{{route('production.upload')}}">Upload Content</a></p>
      <p><a href="{{route('contentlist')}}">Content List</a></p>
      <p><a href="{{route('contentpaymenthistory')}}">Payment History</a></p>
    </div>
    <div class="col-sm-8 text-middle"> 
      <h1>Production House Dashboard</h1>
      
      <hr>
    
    </div>
  </div>
</div>



</body>
</html>
