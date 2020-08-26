<?php
    include "minesweeper_setupsquare.php";
    include "minearray.php";

    setup_square(10,10);
    for ($i = 0; $i < count($number); $i++) {

    if ($i % 10 == 0) {
        echo "\n";
    }
    echo $number[$i] . " ";
    usleep(20000);
    }

    $test = search_around(10,3,10,3,22);
    var_dump($test);
?>