<?php

/**
 * クイックソート
 * - 計算量O(nlogn)
 */
class QuiickSort {
    
    private $numbers;
    
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }

    public function execute()
    {
        $listCount = count($this->numbers);
        $this->quickSort($this->numbers, 0, $listCount - 1);
    }
    
    /**
     * クイックソート
     * @param type $list
     * @param type $first
     * @param type $last
     */
    private function quickSort(&$numbers, $first, $last)
    {
        $firstPointer = $first;
        $lastPointer  = $last;
        $centerValue  = $numbers[intVal(($firstPointer + $lastPointer) / 2)];

        //並び替えができなくなるまで
        do {
            //枢軸よりも左側で値が小さい場合はポインターは進める
            while ($numbers[$firstPointer] < $centerValue) {
                $firstPointer++;
            }
            //枢軸よりも右側で値が大きい場合はポインターを減らす
            while ($numbers[$lastPointer] > $centerValue) {
                $lastPointer--;
            }
        
            if ($firstPointer <= $lastPointer) {
                //ポインターが逆転していない時は交換可能
                $tmp                 = $numbers[$lastPointer];
                $numbers[$lastPointer]  = $numbers[$firstPointer];
                $numbers[$firstPointer] = $tmp;
                //ポインタを進めて分割する位置を指定
                $firstPointer++;
                $lastPointer--;
            }
        } while ($firstPointer <= $lastPointer);

        if ($first < $lastPointer) {
            //左側が比較可能の時
            $this->quickSort($numbers, $first, $lastPointer);
        }

        if ($firstPointer < $last) {
            //右側が比較可能時
            $this->quickSort($numbers, $firstPointer, $last);
        }
    }
    
    public function trace()
    {
        foreach ($this->numbers as $number) {
            echo "{$number} ";
        }
        echo "" . PHP_EOL;
    }
}

$numbers = range(0, 200 , 1);
shuffle($numbers);
$conductor = new QuiickSort($numbers);
$conductor->execute();
$conductor->trace();
