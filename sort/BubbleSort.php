<?php

/**
 * バブルソート
 * - 計算量O(n^2)
 * - ソート済みデータが配列の先頭から順に決定する
 * - 配列が逆になっている要素がなくなるまで、以下処理を繰り返す
 *   1.配列の末尾から隣接する要素を順番に比べていき、大小関係が逆なら入れ替える
 */
class BubbleSort {
    
    public function execute($numbers)
    {
        $cnt = count($numbers);
        for ($i = 0; $i < $cnt; $i++) {
            for ($n = 1; $n < $cnt; $n++) {
                if ($numbers[$n-1] > $numbers[$n]) {
                    $tmp = $numbers[$n];
                    $numbers[$n] = $numbers[$n-1];
                    $numbers[$n-1] = $tmp;
                    $this->trace($numbers);
                }
            }
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
$conductor = new BubbleSort();

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
 * 3 9 2 6 4 7 5 1 
 * 3 2 9 6 4 7 5 1 
 * 3 2 6 9 4 7 5 1 
 * 3 2 6 4 9 7 5 1 
 * 3 2 6 4 7 9 5 1 
 * 3 2 6 4 7 5 9 1 
 * 3 2 6 4 7 5 1 9 
 * 2 3 6 4 7 5 1 9 
 * 2 3 4 6 7 5 1 9 
 * 2 3 4 6 5 7 1 9 
 * 2 3 4 6 5 1 7 9 
 * 2 3 4 5 6 1 7 9 
 * 2 3 4 5 1 6 7 9 
 * 2 3 4 1 5 6 7 9 
 * 2 3 1 4 5 6 7 9 
 * 2 1 3 4 5 6 7 9 
 * 1 2 3 4 5 6 7 9 
 */