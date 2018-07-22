<?php

/**
 * 線形探索
 * - 計算量O(n)
 * - 配列の先頭要素から各要素の値と等しいか順番に確認
 */
class LinearSearch {
    
    private $numbers;
    
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }
    
    public function execute($target)
    {
        $idx = 0;
        foreach ($this->numbers as $number) {
            
            if ($number === $target) {
                return $idx;
            }
            $idx++;
        }
        return "Not Found";
    }
}

$numbers = array(9, 3, 2, 6, 4, 7, 5, 1);
$conductor = new LinearSearch($numbers);
echo $conductor->execute(7) . PHP_EOL;

