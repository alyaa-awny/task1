<?php 

$status= 110;


if ($status <= 50){
    echo "3.50/unit" ;
}
elseif ($status <= 100){
echo"4.00 /unit";
}
elseif($status >= 150){ echo" 6.50/unit";}
else{ echo"4.00 /unit ";}
?> 