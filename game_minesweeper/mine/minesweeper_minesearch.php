<?php
    function search_around($set_w,$select_w,$set_h,$select_h,$point) {
       $point_around[] = 0;
       for ($i = -1; $i <= 1; $i++) {
           for ($n = -1; $n <= 1; $n++) {
               if ($select_h + $i < 1 || $select_h + $i > $set_h || $select_w + $n < 1 || $select_w + $n > $set_w) {
                  continue;
               } else if ($i == 0 && $n == 0) {
                   $point_around[0] = $GLOBALS["number"][$point + (($i * $set_w) + $n)];
               } else {
                   $point_around[] = $GLOBALS["number"][$point + (($i * $set_w) + $n)];
               }
            }
        }
        return $point_around;
    }

?>