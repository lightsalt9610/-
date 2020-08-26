<?php
    include "minesweeper_setupsquare.php";

    setup_square(5,5);
    for ($i = 0; $i < count($number); $i++) {

    if ($i % 5 == 0) {
        echo "\n";
    }
    echo $number[$i] . " ";
    usleep(20000);
    }

?>