
<!DOCTYPE html>
<html>
<head>
	<title>
		Prob Project
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Tangerine">
</head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<style type="text/css">
	.head1{
		font-weight: 400;
		font-size:80px;
		color: #1d3d63;
		font-family: Playfair Display;
	}
	.myp{
		font-weight: 400;
		font-size:14px;
		color: #577291;
		font-style: italic;
		font-family: Lato;
	}
  canvas { max-width: 800px;
  max-height: 800px; }
</style>
<body>
<nav class="navbar navbar-expand-lg  " style="height: 100px; background-color: #002147; font-family: Lato; font-weight: 350; ">
  <a class="navbar-brand" href="#" style="color: white; font-size: 29px;">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color: white; font-size: 24px;">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color: white; font-size: 24px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Charts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="charts.php" >Death Rate By County</a>
          <a class="dropdown-item" href="chart-age.php"  >Death Rate by Age</a>
         
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color: white; font-size: 24px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" >Action</a>
          <a class="dropdown-item" href="#"  >Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" >Something else here</a>
        </div>
      </li>
     
    </ul>
   
  </div>
</nav>