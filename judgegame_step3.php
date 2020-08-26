<?php
    include "setupsquare_step1.php";

    $width = 10;
    $height = 10;

    setup_square($width, $height);

    $gameover = TRUE;
    $already[] = 500;

    while ($gameover) {
    echo "\nselect square:";
    $trim = trim(fgets(STDIN));
    $choose = explode(",", $trim);

    for ($i = 0; $i < $width * $height; $i++) {
        if ($i % $width == 0) {
            echo "\n";
        }

        if ($i == ((($choose[0] * 10) - 10) + $choose[1]) - 1) {
            echo $number[$i] . " ";
            $appeared = $number[$i];
            $already[] = $i;
        } else if (in_array($i, $already)){
            echo $number[$i] . " ";
        } else {
            echo "■";
        }
    }
        if ($appeared == 5) {
            $gameover = FALSE;
        }
    }
?>