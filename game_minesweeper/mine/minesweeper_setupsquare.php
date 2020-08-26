<?php
    function setup_square (int $w, int $h) {

        if($w > 20 || $h > 20) {
        exit("you enter too big scale.");
        }

        $GLOBALS["number"][] = 0; 
        for ($i = 0; $i < $w * $h; $i++) {
            if ($i <= ($w * $h) * 0.35) {
                $GLOBALS["number"][$i] = 2;
            } else {
                $GLOBALS["number"][$i] = 1;                
            }

            if ($i % $w == 0) {
                echo "\n";
            }
            echo "■";
            usleep(10000);
        }
        shuffle($GLOBALS["number"]);
    }
    
?>