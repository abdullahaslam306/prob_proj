<script type="text/javascript">
   var dataValues=[];
  
  function fun(ab,cd,ef,gh,ij)
  {
    dataValues.push(gh);
    dataValues.push(ij);
     
      dataValues.push(ef);
       dataValues.push(cd);
    dataValues.push(ab);

   
  }

</script>
<?php 

session_start();


include("header.php");


if (isset($_GET['submit'])) {

  $myfile2=$_GET['disease'];
 
 $myfile2=$myfile2."-age.csv";
if (($handle2 = fopen($myfile2, "r")) !== false) {
    $filesize2 = filesize($myfile2);
    $firstRow2 = true;
    $aData2 = array();
    $value2=array();
    while (($data2 = fgetcsv($handle2, $filesize2, ",")) !== false) {
        if($firstRow2) {
            $aData2 = $data2;
            $firstRow2 = false;
        } else {
            
              if($data2[0]==$_GET['country'] && $data2[2]==$_GET['year'])
              {
                
             
             echo "<script> fun($data2[3],$data2[4],$data2[5],$data2[6],$data2[7])</script>";
               
               
              }
             
                
            

        }
    }
   
    fclose($handle2);
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
   <div class="form-group ">
       <label for="inputState">Select Year</label>
      <select id="inputState" class="form-control" name="year" >
        <option selected>Choose...</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="193">1993</option>
         
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
         echo " Death rates from $_GET[disease] by age, $_GET[country], $_GET[year]       ";
      }
      ?></h2>
  <canvas id="MeSeStatusCanvas" width="20" height="20"></canvas>
  </div>
  <div class="col-md-2"></div>
</div>






</div>
<script type="text/javascript">
   

var MeSeContext = document.getElementById("MeSeStatusCanvas").getContext("2d");
    var MeSeData = {
        labels: [
        "70+",
            "50-69",
            "15-49",
            "5-14",
            
            "under 5"

        ],
        datasets: [
            {
                label: "DeathRate",
                data: dataValues,
                backgroundColor: ["#669911", "#119966","#668822", "#117766","#644411" ],
                hoverBackgroundColor: ["#66A2EB", "#FCCE56","#669998", "#119966","#669911"]
            }]
    };

var MeSeChart = new Chart(MeSeContext, {
    type: 'horizontalBar',
    data: MeSeData,
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    min: 0 // Edit the value according to what you need
                }
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
});



</script>
<?php include("footer.php"); ?>
