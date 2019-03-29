# 再帰と分割統治法.
分割統治法は以下の手順に基づきアルゴリズムが実装される.
- 与えられた問題を部分問題に分割する(Divide).
- 部分問題を再帰的に解く(Solve).
- 得られた部分問題の解を統合して元の問題を解く(Conquer).

## :one: 全検索.
- 再帰関数の中で2つの再帰関数を呼び出せば計算量O(2のn乗)となる.
```cpp
#include <iostream>

using namespace std;

int S[] = {1, 2, 3, 5, 6, 7, 8, 11, 19, 20, 44, 90};
int n = 12;

// 再帰処理で指定値が生成可能か判定
int solve(int i, int m) {
    
    // mが0の時は与えられた整数を作れた場合
    if (m == 0) {
        return 1;
    }
    // mが0より大きくiがn以上になった場合
    // またはmが0より小さくなった場合
    if (i >= n) {
        return 0;
    }
    int res = solve(i + 1, m) || solve(i + 1, m - S[i]);
    return res;
}

int main(int argc, char** argv) {
    
    int T[] = {3, 13, 300};
    int q = 1;
    
    for (int i = 0; i < q; i++) {
        if (solve(0, T[i])) {
            cout << "Yes." << endl;
        } else {
            cout << "No." << endl;
        }
    }
    return 0;
}
```