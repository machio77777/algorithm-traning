
# :blue_book: 線形探索.

:pushpin:**線形探索の特徴.**
- 線形探索は計算量O(n)のアルゴリズムであるが、番兵による実装では定数倍の高速化が見込まれる.
- 番兵はループ制御を簡略化する目的で使われるプログラミングテクニックの一つ.

:pushpin:**線形探索の手順.**

最後尾に番兵を設定し、forループ処理で先頭から順番に操作.

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
```

n個の整数を含む数列Sとq個の異なる整数を含む数列Tを読み込む.

サンプルプログラムではTに含まれる整数の中でSに含まれるものの個数Cを出力.

```cpp
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

:mag_right:対象ソースは以下に格納.
```
/source/3.search/linear.cpp
```