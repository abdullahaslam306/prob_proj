<script type="text/javascript">
   var dataValues=[];
   var dataLabels = [];
  function fun(ab,cd)
  {
   
    dataValues.push(ab);
   dataLabels.push(cd);
  }

</script>
<?php 

session_start();


include("header.php");
  $country;
$disease;

if (isset($_GET['submit'])) {

  $disease=$_GET['disease'];
 $myfile=$_GET['disease'];
 
 $myfile=$myfile."-death.csv";
// $_SESSION['disease']=$disease;


    $x = array();
    $y = array();
    $xy = array();
    $x2 = array();
    $y2 = array();

  if (($handle = fopen($myfile, "r")) !== false) {
    $filesize = filesize($myfile);
    $firstRow = true;
    $aData = array();
    $n=0;
    while (($data = fgetcsv($handle, $filesize, ",")) !== false) {
        if($firstRow) {
            $aData = $data;
            $firstRow = false;
        } else {
            
              if($data[0]==$_GET['country'])
              {
               $country=$_GET['country'];
               $_SESSION['country']=$country;
                array_push($y, $data[3]);
                array_push($x,$data[2]);
                array_push($xy,$data[2]*$data[3]);
                array_push($x2,$data[2]*$data[2]);
                array_push($y2,$data[3]*$data[3]);
          //   echo "<script>fun($data[3],$data[2])</script>";
               
               $n = count($data);
              }
        }
     

    }
    $sum_x = array_sum($x);
    $sum_y = array_sum($y);
    $sum_xy = array_sum($xy);
    $sum_x2 = array_sum($x2);
    $sum_y2 = array_sum($y2);
   
    //echo $,"  ",$sum_x,"  ",$sum_x2,"  ",$n,"  ",$sum_y2;
    $a = ($sum_y*$sum_x2-$sum_x*$sum_xy)/($n*$sum_x2 - $sum_x*$sum_x);

    $b = ($n*$sum_xy-$sum_x*$sum_y)/($n*$sum_x2-$sum_x*$sum_x);

    $input = 2020;

    $pred = $a + $b*$input;

    echo $pred,'<br>';

   
    fclose($handle);
}
}

 ?>

<div class="container">
  <h2> Charts</h2>
  <form>
    <div class="form-row">
    <div class="col">

   <div class="form-group ">
      
      <label for="inputState">Select Country</label>
      <select id="inputState" class="form-control" name="country" >
        <option selected>Choose...</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Amarican">America</option>
        <option value="Australia">Australia</option>
         
      </select>
    </div>
    </div>
    <div class="col">
   <div class="form-group ">
      <label for="inputState" required>Select Disease</label>
      <select id="inputState" class="form-control" name="disease">
        <option selected>Choose...</option>
        <option value="cancer">Cancer</option>
         <option value="malaria">Malaria</option>
          <option value="stroke">Stroke</option>

        
      </select>

    </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label style="color:white;">.</label>
    <input type="submit" name="submit" value="Find" class="form-control">
    </div>
  </div>
  </div>

 </form>
   <center><p> <p class="lead myp">
Select Country and Disease To View Analysis through Graph</p>
  </p></center>

   
    

     
 

<div class="row">
  <div class="col-md-2">
    
  </div>
  <div class="col-md-8">
     <h2><?php if (isset($_GET['submit'])) {
        # code...
         echo " Graph of $_GET[disease] in  : $_GET[country]  (Last 18 Years)       ";
      }
      ?></h2>
  <canvas id="myChart" width="20" height="20"></canvas>
 
  </div>
  <div class="col-md-2"></div>
</div>





</div>
<script type="text/javascript">
	
 
  

var ctx = document.getElementById("myChart").getContext('2d');

var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: dataLabels,
    datasets: [{
      label: 'Death Rate',
      data: dataValues,
      backgroundColor: 'rgba(254, 100, 137, 60)',borderColor:'rgb(20, 18, 18)',
    }]
  },
  options: {
    scales: {
      xAxes: [{
        display: false,
        barPercentage: 1.3,
        ticks: {
            max: 18,
        }
     }, {
        display: true,
        ticks: {
            autoSkip: false,
            max: 4,
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  }
});


</script>
<?php include("footer.php"); ?>
