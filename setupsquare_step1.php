<?php
    function setup_square (int $w, int $h) {
        $GLOBALS["number"][] = 0; 
        for ($i = 0; $i < $w * $h; $i++) {
            $GLOBALS["number"][$i] = rand(1,9);
            if ($i % $w == 0) {
                echo "\n";
            }
            echo "■";
            usleep(20000);
        }
    }
?>