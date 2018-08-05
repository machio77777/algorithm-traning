<?php

/**
 * マージソート
 * - 計算量O(nlogn)
 * TODO 作成中
 */
class MergeSort {
    
    private $numbers;
    
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }
    
    public function execute()
    {
        echo "【整列前】" . PHP_EOL;
        foreach ($this->numbers as $number) {
            echo "{$number} ";
        }
        echo "" . PHP_EOL;
        
        $cnt = count($this->numbers) - 1;
        $this->merge($this->numbers, 0, $cnt);
        
        echo "【整列後】" . PHP_EOL;
        foreach ($this->numbers as $number) {
            echo "{$number} ";
        }
        echo "" . PHP_EOL;
    }
    
    /**
     * マージ
     * @param integer $first
     * @param integer $end
     */
    private function merge(&$list, $first, $end)
    {
        if ($first < $end) {
            
            $center = intval(($first + $end) / 2);
            $tmp = null;
            
            // 前半部分ソート
            $this->merge($list, $first, $center);
            // 後半部分ソート
            $this->merge($list, $center + 1, $end);
            
            // ソート済み部分の保存
            $p = 0;
            for ($i = $first; $i <= $center; $i++) {
                $tmp[$p++] = $list[$i];
            }
            
            $j = 0;
            $k = $first;
            while ($i <= $end && $j < $p) {
                
                if ($tmp[$j] <= $list[$i]) {
                    $list[$k] = $tmp[$j];
                    $k++;
                    $p++;
                } else {
                    $list[$k] = $list[$i];
                    $k++;
                    $i++;
                }
            }
            
            while ($j < $p) {
                $list[$k++] = $tmp[$j++];
            }
        }
    }
}

$numbers = range(0, 20, 1);
shuffle($numbers);
$conductor = new MergeSort($numbers);
$conductor->execute();