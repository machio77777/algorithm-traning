
# :closed_book: クイックソート.

:pushpin:**クイックソートの特徴.**
- 一般的に最も高速なソートアルゴリズムと言われ計算量O(nlogn).

:pushpin:**クイックソートの手順.**  

クイックソートは分割統治法に基づくアルゴリズム.  

:one:配列全体を対象としてquickSortを実行.  
:two:quickSortは以下のとおり.  
-- :one:partitionにより、対象の部分配列を前後2つの部分配列へ分割.  
-- :two:前方の部分配列に対してquickSortを実行.  
-- :three:後方の部分配列に対してquickSortを実行.  

partitionで2つ分割し、2つのグループに再帰的にquickSortを行う.

<img src='../.vuepress/public/quicksort-1.png' style='width:60%;' />  

クイックソートはpartition内部で離れた要素を交換するので安定アルゴリズムではない.

ただしマージソートとは違い、追加のメモリ領域が不要でインプレースソートである特徴がある.
```cpp
#include <iostream>

using namespace std;

// パーティション
int patition(int A[], int n, int p, int r) {
    
    int i = p - 1; // 先頭要素
    int x = A[r];  // 基準値(最終idx)
    int tmp;       // 一時領域
    
    // 先頭要素から基準値までループ処理
    for (int j = p; j < r; j++) {
        // 比較対象が基準値x以下の場合は入れ替え
        if (A[j] <= x) {
            i++;
            tmp = A[i];
            A[i] = A[j];
            A[j] = tmp;
        }
    }
    tmp = A[i + 1];
    A[i + 1] = x;
    A[r] = tmp;
    return i + 1;
}

// クイックソート
// patitionによって対象の部分配列を前後2つの部分配列へ分割.
void quickSort(int A[], int n, int p, int r) {
    int q;
    if (p < r) {
        // 対象を部分配列に分割.
        q = patition(A, n, p, r);
        // 前方部分のクイックソート.
        quickSort(A, n, p, q - 1);
        // 後方部分のクイックソート.
        quickSort(A, n, q + 1, r);
    }
}

int main(int argc, char** argv) {
    
    int A[] = {13, 19, 9, 5, 12, 8, 7, 4, 21, 2, 5, 3, 14, 6, 11};
    int n = 15;
    
    quickSort(A, n, 0, n - 1);
    
    // [実行結果]2 3 4 5 5 6 7 8 9 11 12 13 14 19 21
    for (int i = 0; i < n; i++) {
        cout << A[i];
        cout << " ";
    }
    return 0;
}
```

:mag_right:対象ソースは以下に格納.
```
/source/5.hsort/quick.cpp
```