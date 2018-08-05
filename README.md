
# データ構造とアルゴリズム

**■ アルゴリズムの効率評価**

|評価項目|概要|
|---|---|
|時間計算量|プログラムの実行に必要な時間を評価.<br/>計算機のプロセッサをどれだけ利用するか見積もる.|
|領域計算量|プログラムの実行に必要な領域を評価.<br/>計算機のメモリをどれだけ利用するか見積もる.|

**■ 計算量O(オーダ)**

```
O(n)やO(logN)やO(NlogN)はnが増加してもさほど計算量は増減しないので効率◯
O(n^2)の場合、計算量はn^2に比例するので計算効率は悪い
```

**【参考文献】**<br>
- [プログラミングコンテスト攻略のためのアルゴリズムとデータ構造](https://www.amazon.co.jp/dp/B00U5MVXZO/ref=dp-kindle-redirect?_encoding=UTF8&btkr=1)

## 初等整的列

効率は悪いが比較的実装が簡単な並べ替えアルゴリズム.

**■ 挿入ソート**
- 計算量O(n^2)

```php
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
```

**■ バブルソート**
- 計算量O(n^2)

```php
$cnt = count($numbers);
for ($i = 0; $i < $cnt; $i++) {
    for ($n = 1; $n < $cnt; $n++) {
        if ($numbers[$n-1] > $numbers[$n]) {
            $tmp = $numbers[$n];
            $numbers[$n] = $numbers[$n-1];
            $numbers[$n-1] = $tmp;
        }
    }
}
```

**■ 選択ソート**
- 計算量O(n^2)

```php
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
}
```

## 探索

**■ 線形探索**
- 計算量O(n)

```php
$idx = 0;
foreach ($this->numbers as $number) {
            
    if ($number === $target) {
        return $idx;
    }
    $idx++;
}
return "Not Found";
```

**■ 二分探索**
- 計算量O(logn)

```php
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
```

### 再帰・分割倒置法

**■ 全検索**
- 計算量O(2^n)

````php
function solve($i, $m)
{   
    if ($m === 0) {
        return true;
    }
    if ($i >= count($this->numbers)) {
        return 0;
    }
    return $this->solve($i + 1, $m) || $this->solve($i + 1, $m - $this->numbers[$i]);
}
    
function execute($target)
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
````

## 高等整的列

**■ マージソート**
- 計算量O(nlogn)
- 作成中

**■ クイックソート**
- 計算量O()
- 作成中
