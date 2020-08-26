<?php
#ステップ２のプログラムを改良して、ゲームらしくゲームオーバーの要素を入れた
    include "setupsquare_step1.php";

    $width = 10;
    $height = 10;

    setup_square($width, $height);
    
    #変数の定義
    $gameover = TRUE;
    $already[] = 500;

    #ゲームオーバーになるまで繰り返す
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
            #出た数字と開けたマスを記憶しておく
            $appeared = $number[$i];
            $already[] = $i;
        } else if (in_array($i, $already)){
            #既に選択したマスを開けたままにしておく
            echo $number[$i] . " ";
        } else {
            echo "■";
        }
    }
        #5が出ていたら、ゲーム終了
        if ($appeared == 5) {
            $gameover = FALSE;
        }
    }
?>
