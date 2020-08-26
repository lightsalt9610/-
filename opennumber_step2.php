<?php
#ステップ１で作ったプログラムを使い、指定した場所のマスを開けるプログラム。

    include "setupsquare_step1.php";

    #サイズを指定
    $width = 10;
    $height = 10;
    
    setup_square($width, $height);
    #開ける場所はカンマ区切りで数字二つを指定する型にした。
    echo "\nselect square:";
    $trim = trim(fgets(STDIN));
    $choose = explode(",", $trim);

    for ($i = 0; $i < $width * $height; $i++) {
        if ($i % $width == 0) {
            echo "\n";
        }
        #指定した場所なら、そのマスに格納された数字を表示する
        if ($i == ((($choose[0] * 10) - 10) + $choose[1])) {
            echo $number[$i] . " ";
        } else {
            echo "■";
        }

    }
?>
