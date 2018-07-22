<?php

/**
 * 選択ソート
 * - 計算量O(N^2)
 * - 以下の処理をN-1回繰り返す
 *   1.未ソート部分から最小の要素の位置minjを特定
 *   2.minjの位置にある要素と未ソート部分の先頭要素を交換
 */
class SelectSort {
    
    public function execute($numbers)
    {
        $cnt = count($numbers);
        for ($i = 0; $i < $cnt; $i++) {
            // 未ソート部分での最小要素
            $minj = $i;
            for ($j = $i; $j < $cnt; $j++) {
                // 未ソート部分で最小値の要素を抽出
                if ($numbers[$j] < $numbers[$minj]) {
                    $minj = $j;
                }
            }
            // 未ソート部分での最小要素を先頭要素(未ソート部分)と交換
            $tmp = $numbers[$i];
            $numbers[$i] = $numbers[$minj];
            $numbers[$minj] = $tmp;
            
            $this->trace($numbers);
        }
    }
    
    public function trace($numbers)
    {
        foreach ($numbers as $number) {
            echo "{$number} ";
        }
        echo "" . PHP_EOL;
    }
}

$numbers = array(9, 3, 2, 6, 4, 7, 5, 1);
$conductor = new SelectSort();

echo "---------------" . PHP_EOL;
echo "[整列前]" . PHP_EOL;
$conductor->trace($numbers);
echo "---------------" . PHP_EOL;
echo "[整列後]" . PHP_EOL;
$conductor->execute($numbers);

/**
 * ---------------
 * [整列前]
 * 9 3 2 6 4 7 5 1 
 * ---------------
 * [整列後]
 * 1 3 2 6 4 7 5 9 
 * 1 2 3 6 4 7 5 9 
 * 1 2 3 6 4 7 5 9 
 * 1 2 3 4 6 7 5 9 
 * 1 2 3 4 5 7 6 9 
 * 1 2 3 4 5 6 7 9 
 * 1 2 3 4 5 6 7 9 
 * 1 2 3 4 5 6 7 9 
 */