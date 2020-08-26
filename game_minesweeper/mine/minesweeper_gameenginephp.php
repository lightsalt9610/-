<?php
    function minesweeper($width,$height){
        include "minesweeper_minesearch.php"
        $gameover = TRUE;
        $already[] = 500;

        while ($gameover) {
        
        $minefind = 0;

        echo "\nselect square:";
        $trim = trim(fgets(STDIN));
        $choose = explode(",", $trim);
        
        if (in_array(FALSE,$choose) || $width < $choose[1] || $height < $choose[0]) {
            print "you enter inregal number.";
            continue;
        }
        
        $point_c = ($choose[1] * 10 + $choose[0]) - 11;
        $mines = search_around($width,$choose[1],$height,$choose[0],$point_c);
        foreach ($mines as $value) {
            if($value == 2) {
                $minefind++;
            }
        }
        for ($i = 0; $i < $width * $height; $i++) {
            if ($i % $width == 0) {
                echo "\n";
            }
    
            if ($i == $point_c) {
                if ($mines[0] == 2) {
                    echo "* ";
                    $appeared = $mines[0];
                } else {
                    echo $minefind . " ";
                    $already_p[] = $i;
                    $already_n[$i] = $mindfind;
                }
            } else if (in_array($i, $already_p)){
                echo $already_n[$i] . " ";
            } else {
                echo "■";
            }
        }
            if ($appeared == 2) {
                $gameover = FALSE;
            }

            if (count($already) > $width * $height) {
                exit("\n\nGAME CLEAR!\n");
            }
        }

        echo"\n\nGAME OVER\n";
    }
?>