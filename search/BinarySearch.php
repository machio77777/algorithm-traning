<?php

/**
 * 二分探索
 * - 計算量O(logn)
 * - 要素が昇順ソートされていることが必要
 * - 探索要素(left〜right)の真ん中の要素と検索要素を比較
 * - 要素が等しくない場合は大小関係を比較し、探索エリアを狭めていく
 */
class BinarySearch {
    
    private $numbers;
    
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }
    
    public function execute($target)
    {
        $left = 0;
        $right = count($this->numbers);
        
        while ($left < $right) {
            $mid = ($left + $right) / 2;
            
            if ($target === $this->numbers[$mid]) {
                return "Hit";
            } elseif ($target > $this->numbers[$mid]) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        return "Not Found";
    }
}

$target = 10;
$numbers = array(1, 3, 6, 7, 10, 11, 15, 23, 36, 51, 64, 86, 103, 121);
$conductor = new BinarySearch($numbers);
echo $conductor->execute($target) . PHP_EOL;

