<?php

$str = '"C:\\Program Files\\R\\R-3.6.3\\bin\Rscript.exe" C:\\wamp64\\www\\Prob_Project\\prob\\desc.R "'; 
      echo($str);
     exec($str,$output);
     print_r($output);
?>