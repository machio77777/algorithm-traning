<?php

/**
 * 挿入ソート
 * - 計算量O(n^2)
 * - ある程度ソートされた要素には高速に動作する
 * - 先頭の要素はソート済みである
 * - 未ソートがなくなるまで以下処理を繰り返す
 *   1.未ソート部分の先頭から要素を1つ取り出しvに記録
 *   2.ソート済みの部分において、vより大きい要素を後方へ1つずつ移動する
 *   3.最後に空いた位置に「取り出したい要素v」に挿入する
 */
class InsertSort {
    
    public function execute($numbers)
    {
        for ($i = 1; $i < count($numbers); $i++) {
            
            $tmp = $numbers[$i];
            $j = $i - 1;
            
            // ソート済み要素($numbers[$j]) > 比較要素($tmp)
            // ソート済み要素の頭側に向かって比較ソートしていく
            while ($j >= 0 && ($numbers[$j] > $tmp)) {
                $numbers[$j + 1] = $numbers[$j];
                $j--;
            }
            $numbers[$j + 1] = $tmp;
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
$conductor = new InsertSort();

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
 * 2 3 9 6 4 7 5 1 
 * 2 3 6 9 4 7 5 1 
 * 2 3 4 6 9 7 5 1 
 * 2 3 4 6 7 9 5 1 
 * 2 3 4 5 6 7 9 1 
 * 1 2 3 4 5 6 7 9 
 */