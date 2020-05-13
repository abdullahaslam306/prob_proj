
<?php 

session_start();


include("header.php");


if (isset($_GET['submit'])) {

  $str = '"C:\\Program Files\\R\\R-3.6.3\\bin\Rscript.exe" C:\\wamp64\\www\\Prob_Project\\prob\\sample.R '.$_GET["country1"].' '.$_GET["country2"].' '.$_GET["country3"].' '.$_GET["disease"].'"'; 
 
  exec($str,$output);
  $res = $output[1];
     $res = explode(" ",$res);
    
     $values = array();
     foreach($res as $x)
     {
       if($x!=="")
       array_push($values,$x);
     }
     $res2 = $output[2];
     $res2 = explode(" ",$res2);
    
     $values2 = array();
     foreach($res2 as $x2)
     {
       if($x2!=="")
       array_push($values2,$x2);
     }


}



 ?>

<div class="container">
  <h2> ANOVA Test</h2>
  <form>
    <div class="form-row">
    <div class="col">

   <div class="form-group ">
      
      <label for="inputState">Select Country</label>
      <select id="inputState" class="form-control" name="country1" >
        <option selected>Choose...</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="USA">America</option>
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
        <option value="USA">America</option>
        <option value="Australia">Australia</option>

        
      </select>

    </div>
    </div>
     <div class="col">
   <div class="form-group ">
       <label for="inputState">Select Country</label>
      <select id="inputState" class="form-control" name="country3" >
        <option selected>Choose...</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="USA">America</option>
        <option value="Australia">Australia</option>
         
      </select>

    </div>
    </div>
    
    <div class="col">
   <div class="form-group ">
      <label for="inputState" required>Select Disease</label>
      <select id="inputState" class="form-control" name="disease">
        <option selected>Choose...</option>
        <option value="Overall">Overall</option>
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

   <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <h2 class="head2">NULL HYPOTHESIS</h2>
    <p>ndjknekldmweld,</p>
    <h2 class="head3">Anova Results <?php if(isset($_GET['submit'])){
      echo "($_GET[country1] + $_GET[country2] + $_GET[country3] with $_GET[disease])";
    }?></h2>
    <table class="table table-bordered">
  <thead>
    <tr style="background-color: #002147; Color:white;">
      <th scope="col">#</th>
      <th scope="col">With in Groups</th>
      <th scope="col">Between Groups</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sum of Squares</th>
      <td><?php if(isset($_GET['submit'])){
           echo $values[2] ;}else{
           echo "NA";}?> </td>
   
     
      <td><?php if(isset($_GET['submit'])){
           echo $values2[2] ;}else{
           echo "NA";} ?> </td>
    </tr>
    <tr>
      <th scope="row">Mean of Squares</th>
      <td><?php if(isset($_GET['submit'])){
           echo $values[3] ;}else{
           echo "NA";} ?></td>
      <td><?php if(isset($_GET['submit'])){
           echo $values2[3] ;}else{
           echo "NA";} ?></td>
     
    </tr>
    <tr>
      <th scope="row">Degree of Freedom</th>
      <td><?php if(isset($_GET['submit'])){
           echo $values[1] ;}else{
           echo "NA";} ?></td>
      <td><?php if(isset($_GET['submit'])){
           echo $values2[1] ;}else{
           echo "NA";} ?></td>
    
    </tr>
    
  </tbody>
</table>  
  </div>
    <div class="col-md-2"></div>
    </div>
    <div class="row">
     <div class="col-md-2"></div>
     
     <div class="col-md-8">
     
       <table class="table table-bordered">
         <tr style="background-color: #002147; Color:white;">
         <th>F Ratio</th>
         <th>P Value</th>
</tr>
         <tbody>
           <tr>
           <td>
           <?php if(isset($_GET['submit'])){
           echo $values[4] ;}else{
           echo "NA";} ?>
           </td>
           <td>
           <?php if(isset($_GET['submit'])){
           echo $values[5] ;}else{
           echo "NA";} ?>
           </td>
</tr>
         </tbody>
       </table>
       <h2 class="head2">Conclusion</h2>
     </div>
     <div class="col-md-2"></div>
    </div>


     
 








</div>

<?php 

include("footer.php"); ?>