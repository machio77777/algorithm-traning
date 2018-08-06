
# データ構造とアルゴリズム

**■ アルゴリズムの効率評価**

|評価項目|概要|
|---|---|
|時間計算量|プログラムの実行に必要な時間を評価.<br/>計算機のプロセッサをどれだけ利用するか見積もる.|
|領域計算量|プログラムの実行に必要な領域を評価.<br/>計算機のメモリをどれだけ利用するか見積もる.|

**■ 計算量O(オーダ)**

- O(n)やO(logN)やO(NlogN)はnが増加してもさほど計算量は増減しないので効率◯
- O(n^2)の場合、計算量はn^2に比例するので計算効率は悪い

**【参考文献】**<br>
- [プログラミングコンテスト攻略のためのアルゴリズムとデータ構造](https://www.amazon.co.jp/dp/B00U5MVXZO/ref=dp-kindle-redirect?_encoding=UTF8&btkr=1)

## 初等整的列

効率は悪いが比較的実装が簡単な並べ替えアルゴリズム.

**■ 挿入ソート**
- 計算量O(n^2)
- ある程度ソートされた要素には高速に動作する
- 先頭の要素はソート済みである

**■ バブルソート**
- 計算量O(n^2)
- ソート済みデータが配列の先頭から順に決定する

**■ 選択ソート**
- 計算量O(n^2)

## 探索

**■ 線形探索**
- 計算量O(n)
- 配列の先頭要素から各要素の値と等しいか順番に確認

**■ 二分探索**
- 計算量O(logn)
- 要素が昇順ソートされていることが必要
- 探索要素(left〜right)の真ん中の要素と検索要素を比較
- 要素が等しくない場合は大小関係を比較し、探索エリアを狭めていく

### 再帰・分割倒置法

**■ 全検索**
- 計算量O(2^n)

## 高等整的列

**■ マージソート**
- 計算量O(nlogn)

**■ クイックソート**
- 計算量O()
- 作成中
