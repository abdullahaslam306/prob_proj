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
  <h2> 2 Sample Test Test</h2>
  <form>
    <div class="form-row">
    <div class="col">

   <div class="form-group ">
      
      <label for="inputState">Select Country</label>
      <select id="inputState" class="form-control" name="country1" >
        <option selected>Choose...</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="American Samoa">America</option>
        <option value="Australia">Australia</option>
         
      </select>
    </div>
    </div>
    <div class="col">
   <div class="form-group ">
      <label for="inputState" required>Select Country</label>
      <select id="inputState" class="form-control" name="country2">
        <option selected>Choose...</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="American Samoa">America</option>
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
           <option value="tb">Tuberculosis</option>

        
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
Select Countries and Disease to View Results</p>
  </p></center>

   
    

     
 








</div>

<?php include("footer.php"); ?>