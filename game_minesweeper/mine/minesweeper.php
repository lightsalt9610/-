<?php
    #ファイルの読み込み
    include "minesweeper_setupsquare.php";
    include "minesweeper_minesearch.php";

    #必要な変数の定義
    $gameover = TRUE;
    $already_p[] = 500;

    #マップサイズの指定
    echo"Set square width:";
    $width = trim(fgets(STDIN));
    echo"Set square height:";
    $height = trim(fgets(STDIN));

    #地雷の位置の設定
    setup_square($width,$height);

    #ゲーム開始
    while ($gameover) {
    
        #初期化
        $minefind = 0;
    
       #開ける場所の選択
        echo "\nselect square:";
        $trim = trim(fgets(STDIN));
        $choose = explode(",", $trim);
        
        $point_c = (($choose[0] * $width) + $choose[1]) - ($width + 1);
        #選択がおかしい場合やり直し
        if (in_array(FALSE,$choose) || $width < $choose[1] || $height < $choose[0] || in_array($point_c, $already_p)) {
            print "you enter irrygal number.";
            continue;
        }
        
        #周囲の地雷を探索

        $mines = search_around($width,$choose[1],$height,$choose[0],$point_c);

        #地雷の数を代入
        foreach ($mines as $value) {
            if($value == 2) {
            $minefind++;
            }
        }

        #指定場所の探索
        for ($i = 0; $i < $width * $height; $i++) {
            if ($i % $width == 0) {
                echo "\n";
            }
            #上から　選んだ場所、既に選ばれた場所、まだ選んでない場所の処理
            if ($i == $point_c) {
                #開けた所が地雷かどうか
                if ($mines[0] == 2) {
                    echo "* ";
                    $appeared = TRUE;
                } else {
                    echo $minefind . " ";
                    #開けた場所の記憶
                    $already_p[] = $i;
                    $already_n[$i] = $minefind;
                    $appeared = FALSE;
                }
            } else if (in_array($i, $already_p)){
                echo $already_n[$i] . " ";
            } else {
                echo "■";
            }
        }
            if ($appeared) {
                $gameover = FALSE;
            }
            #全て開けたらクリア
            if (count($already_p) > count(array_keys($number, 1))) {
                exit("\n\nGAME CLEAR!\n");
            }
        }
    echo"\n\nGAME OVER\n";
?>