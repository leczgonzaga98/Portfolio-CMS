<?php 


for ($i=1; $i<=5; $i++){
    for($j=1; $j<=$i; $j++){
        echo "<b> * </b>";
    }
   echo "<br/>";
}

for($i=5; $i>=0; $i-- ){
    for ($j=0; $j<$i; $j++){
    echo" * ";
    }
    echo "<br/>";
}

?>