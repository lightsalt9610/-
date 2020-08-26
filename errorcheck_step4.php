<?php
#ステップ３のプログラムのままでは色々とエラーが出てしまうので、修正と細かい変更を加えた。
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
        
    #最大サイズよりも大きくしたり、数値を入力出来ていなかった場合は入力しなおし
    if (in_array(FALSE,$choose) || $width < $choose[0] || $height < $choose[1]) {
        print "you enter inregal number.";
        continue;
    }

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
    #終了したときにゲームオーバーの文字を表示するようにした
    echo"\n\nGAME OVER\n";
?>
