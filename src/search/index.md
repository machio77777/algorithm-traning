
# :clipboard: 探索.
- 探索あるいは検索とは、データの集合の中から目的の要素を探し出す処理.

## :one: 線形探索.
- 線形探索は計算量O(n)のアルゴリズムだが番兵を使った実装は定数倍の高速化が見込まれる.
```cpp
#include <iostream>

using namespace std;

// 線形探索
int search(int S[], int n, int key) {
    // 番兵を配列Sの最終Indexに設定
    S[n] = key;
    int j = 0;
    while (S[j] != key) {
        j++;
    }
    // 一致しない場合はSの要素数n=jになる
    return j != n;
}

// n個の整数を含む数列Sとq個の異なる整数を含む数列Tを読み込む.
// Tに含まれる整数の中でSに含まれるものの個数Cを出力.
int main(int argc, char** argv) {
    
    int S[] = {7, 19, 5, 8, 11, 3, 2, 20, 1, 6, 90, 44};
    int T[] = {4, 8, 1, 88, 43, 7, 9, 3, 90};
    int n = 12;
    int q = 9;
    int sum = 0;
    
    // 数列Tの個数q分だけループ処理
    for (int i = 0; i < q; i++) {
        if (search(S, n, T[i])) {
            sum++;
        }
    }
    cout << sum << endl;
    return 0;
}
```

## :two: 二分探索.
- 
```cpp
// 保留
```

## :three: ハッシュ.
- 
```cpp
// 保留
```
