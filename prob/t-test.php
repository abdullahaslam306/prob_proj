
<?php
include("header.php");
if(isset($_GET['submit']))
{
 $str = '"C:\\Program Files\\R\\R-3.6.3\\bin\Rscript.exe" C:\\wamp64\\www\\Prob_Project\\prob\\ttest.R '.$_GET["country1"].' '.$_GET["country2"].' Overall"'; 
 
 exec($str,$output);
 
 $res = $output[4];
  $res = explode(" ",$res);
  $values = array();
  foreach($res as $x)
  {
    if($x!=="")
    array_push($values,$x);
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

   
    <div class="row"></div>

     
    <div class="row">
     <div class="col-md-2"></div>
     
     <div class="col-md-8">
     <h2 class="head3">T-Test Results <?php if(isset($_GET['submit'])){
      echo "($_GET[country1] + $_GET[country2]  with OVERALL)";
    }?></h2>
       <table class="table table-bordered">
         <tr style="background-color: #002147; Color:white;">
         <th>T Value</th>
         <th>P Value</th>
         <th>DF</th>
</tr>
         <tbody>
           <tr>
           <td>
           <?php 
           if(isset($_GET['submit'])){
           echo $values[2] ;}else{
           echo "NA";}?>
           </td>
           <td>
           <?php  if(isset($_GET['submit'])){
           echo $values[8] ;}else{
           echo "NA";}?>
           </td>
           <td>
           <?php   if(isset($_GET['submit'])){
           echo $values[5] ;}else{
           echo "NA";}?>
           </td>
</tr>
         </tbody>
       </table>
       <h2 class="head2">Conclusion</h2>
     </div>
     <div class="col-md-2"></div>
    </div>








</div>

<?php include("footer.php"); ?>