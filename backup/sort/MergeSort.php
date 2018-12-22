<?php

/**
 * マージソート
 */
class MergeSort
{
    private $targets;
    
    public function __construct($targets)
    {
        $this->targets = $targets;
    }
    
    public function execute()
    {
        /* 整列前 */
        $this->trace();
        
        $this->mergeSort(0, count($this->targets) - 1);
        
        /* 整列後 */
        $this->trace();
    }
    
    /**
     * マージソート
     * @param integer $first
     * @param integer $last
     */
    private function mergeSort($first, $last)
    {
        if ($first < $last) {
            
            $center = intval(($first + $last) / 2);
            /* 前半マージ */
            $this->mergeSort($first, $center);
            /* 後半マージ */
            $this->mergeSort($center + 1, $last);
            
            /* ソート済み要素の退避 */
            $p = 0;
            for ($i = $first; $i <= $center; $i++) {
                $tmp[$p++] = $this->targets[$i];
            }
            
            $j = 0;
            $k = $first;
            while ($i <= $last && $j < $p) {
                /* 前半部分が後半部分より小さい場合 */
                if ($tmp[$j] <= $this->targets[$i]) {
                    $this->targets[$k] = $tmp[$j];
                    $k++;
                    $j++;
                /* 後半部分の方が小さい場合 */
                } else {
                    $this->targets[$k] = $this->targets[$i];
                    $k++;
                    $i++;
                }
            }
            
            while ($j < $p) {
                $this->targets[$k++] = $tmp[$j++];
            }
        }
    }
    
    private function trace()
    {
        foreach ($this->targets as $number) {
            echo "{$number} ";
        }
        echo "" . PHP_EOL;
    }
}

$targets = range(0, 30 , 1);
shuffle($targets);
$conductor = new MergeSort($targets);
$conductor->execute();
    