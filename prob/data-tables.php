<?php
error_reporting(0);
session_start();
include ("header.php");
$country = array();
$code = array();
$year = array();
$deathrate = array();

 

if (isset($_GET['submit'])) 
{  
    $disease=$_GET['disease'];
    $myfile=$_GET['disease']; 
    $myfile=$myfile."-death.csv";
    $_SESSION['disease']=$disease;
    if (($handle = fopen($myfile, "r")) !== false) 
    {
        $filesize = filesize($myfile);
        $firstRow = true;
        $aData = array();
        $value = array();
        $contents = '';
        $str_arr = array();
        $means = array();
        $stds = array();
        $years = array();
        $countries = array();   
        $stria = "";
        $stria = fgets($handle);
        while (!feof($handle)) 
        { 
            $contents = fgets($handle);
            $str_arr = explode (",", $contents);  
            array_push($country,$str_arr[0]);  
            array_push($code, $str_arr[1]);  
            array_push($year, $str_arr[2]);
            array_push($deathrate, $str_arr[3]);
        }          
        array_push($countries, $country[0]);
        for($i = 0; $i < sizeof($country); $i++)
        {
            if($country[$i] != $country[$i-1])
            {
                array_push($countries, $country[$i]);
            }
        }
        $mini = min($year);
        $maxi = max($year);
        for($i = $mini; $i < $maxi; $i++)
        {
            array_push($years, $i);            
        }
        for($c = 0; $c < sizeof($countries); $c++)
        {   $mean = 0;
            $std = 0;
            $numberofterms = 0;
            $sumofterms = 0;
            $variance = 0.0; 
            for($i = 0; $i < sizeof($country); $i++)
            {
                if($country[$i] == $countries[$c])
                {
                    $numberofterms++;
                    $sumofterms = $sumofterms + $deathrate[$i];
                }
            }
            $mean = $sumofterms / $numberofterms;
            for($i = 0; $i < sizeof($country); $i++)
            {
                if($country[$i] == $countries[$c])
                {
                    $variance += pow(($deathrate[$i] - $mean), 2);
                }
            }
            array_push($means,$mean);
            $temp = sqrt($variance/$numberofterms);
            array_push($stds,$temp);
        }
        echo '<table><thead><tr>';
        echo '<th>Country</th>';
        echo '<th>Mean of Death Ratio</th>';
        echo '<th>Std of Death Ratio</th>';
        echo '</tr></thead><tbody>';
        for($i = 1; $i < sizeof($countries); $i++)
        {
            echo '<tr>';
            echo '<td>'.$countries[$i].'</td>';
            echo '<td>'.$means[$i].'</td>';
            echo '<td>'.$stds[$i].'</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }        
    fclose($handle);
}



?>
<html>
<div class="container">
  <h2>Get Tables</h2>
  <form>
    <div class="form-row">
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















<?php
include ("footer.php")
?>