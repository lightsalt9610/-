<?php
#ステップ４のプログラムがエラーまみれだったので、とりあえずゲームとして成立するように仕上げておく
    include "setupsquarefrexi_step5.php";
    #サイズを標準入力で取るようにした
    print"set square width size:";
    $width = trim(fgets(STDIN));
    print"set square height size:";
    $height = trim(fgets(STDIN));
    #ハズレも指定 
    print"set avoidnumber:";
    $avoidnumber = trim(fgets(STDIN));

    setup_square($width, $height);
    numbergame_avoid($width,$height,$avoidnumber);
    #関数化
    function numbergame_avoid($width,$height,$avoidnumber){
        #もしもハズレがありえない数字にしていたら強制終了するように
        if($avoidnumber > 9 || $avoidnumber < 1) {
            exit("\nplease enter number in 1~9");
        }
        
        $gameover = TRUE;
        $already[] = 500;
    
        while ($gameover) {
        echo "\nselect square:";
        $trim = trim(fgets(STDIN));
        $choose = explode(",", $trim);
        #サイズが可変になったのでこの辺りも可変するように
        if (in_array(FALSE,$choose) || $width < $choose[0] || $height < $choose[1]) {
            print "you enter inregal number.";
            continue;
        }
    
        for ($i = 0; $i < $width * $height; $i++) {
            if ($i % $width == 0) {
                echo "\n";
            }
    
            if ($i == ((($choose[0] * $width) - $width) + $choose[1]) - 1) {
                echo $GLOBALS["number"][$i] . " ";
                $appeared = $GLOBALS["number"][$i];
                $already[] = $i;
            } else if (in_array($i, $already)){
                echo $GLOBALS["number"][$i] . " ";
            } else {
                echo "■";
            }
        }
            if ($appeared == $avoidnumber) {
                $gameover = FALSE;
            }
            #全部開けられたらクリア
            if (count($already) > $width * $height) {
                exit("\n\nGAME CLEAR!\n");
            }
        }

        echo"\n\nGAME OVER\n";
    }


?>
