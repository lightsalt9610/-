<?php
#ある程度纏まってきたので本格的にマインスイーパーに仕上げていく
    function setup_square (int $w, int $h) {
        #限界サイズを設定
        if($w > 20 || $h > 20) {
        exit("you enter too big scale.");
        }

        $GLOBALS["number"][] = 0; 
        for ($i = 0; $i < $w * $h; $i++) {
            $GLOBALS["number"][$i] = rand(1,2);
            if ($i % $w == 0) {
                echo "\n";
            }
            echo "■";
            usleep(20000);
        }
    }
?>
