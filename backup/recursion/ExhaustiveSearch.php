<?php

class ExhaustiveSearch {
    
    private $numbers;
    
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }
    
    /**
     * 再帰処理
     * @param integer $i
     * @param integer $m   生成したい値
     * @return boolean|int
     */
    private function solve($i, $m)
    {
        echo "i:{$i} m:{$m}" . PHP_EOL;
        
        if ($m === 0) {
            return true;
        }
        if ($i >= count($this->numbers)) {
            return 0;
        }
        return $this->solve($i + 1, $m) || $this->solve($i + 1, $m - $this->numbers[$i]);
    }
    
    public function execute($target)
    {
        $cnt = count($target);
        for ($i = 0; $i < $cnt; $i++) {
            
            if ($this->solve(0, $target[$i])) {
                echo "Yes" . PHP_EOL;
            } else {
                echo "No" . PHP_EOL;
            }
            
        }
    }
}

$numbers = array(1, 3, 6, 9);
$conductor = new ExhaustiveSearch($numbers);

$target = array(2, 4, 12);
$conductor->execute($target);