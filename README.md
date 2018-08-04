
# データ構造とアルゴリズム

【参考文献】
[プログラミングコンテスト攻略のためのアルゴリズムとデータ構造](https://www.amazon.co.jp/dp/B00U5MVXZO/ref=dp-kindle-redirect?_encoding=UTF8&btkr=1)

**アルゴリズムの効率評価**

|評価項目|概要|
|---|---|
|時間計算量|プログラムの実行に必要な時間を評価.<br/>計算機のプロセッサをどれだけ利用するか見積もる.|
|領域計算量|プログラムの実行に必要な領域を評価.<br/>計算機のメモリをどれだけ利用するか見積もる.|

**計算量O(オーダ)**

```
O(n)やO(logN)やO(NlogN)はnが増加してもさほど計算量は増減しないので効率◯
O(n^2)の場合、計算量はn^2に比例するので計算効率は悪い
```

## 初等整的列

効率は悪いが比較的実装が簡単な並べ替えアルゴリズム.

**挿入ソート**
- 計算量O(n~2)

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

**バブルソート**
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

**選択ソート**
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

## データ構造
- スタック
- キュー
- リスト

## 探索
- 線形探索
- 二分探索
- ハッシュ法

## 再帰・分割統治法
