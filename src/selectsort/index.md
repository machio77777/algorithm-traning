
# :closed_book: 選択ソート.

:clipboard:安定なソートアルゴリズムだが計算量O(nの2乗)となる. 

```cpp
#include <iostream>

using namespace std;

// [選択ソート]
// 挿入ソート同様に[ソート済みの部分列]と[未ソートの部分列]に分ける.
// 以下の処理をN-1回繰り返す.
// 1. 未ソート部分列から最小の要素の位置minjを特定.
// 2. minjの位置にある要素と未ソート部分の先頭要素を交換.
void selection(int A[], int N) {
    
    int minj, tmp;
    
    // i:未ソート部分の先頭を表すループ変数
    // 配列Aの先頭から末尾に向けて移動.
    for (int i = 0; i < N - 1; i++) {
        // 各ループ処理でi番目からN-1番目迄の要素で最小要素の位置.
        minj = i;
        // j:未ソート部分から最小要素の位置(minj)を探すためのループ変数.
        for (int j = i; j < N; j++) {
            // minjの隣り合う要素がminj要素より小さければminjを入れ替える.
            if (A[j] < A[minj]) {
                minj = j;
            }
        }
        // 未ソート部分の先頭(i)要素は一時領域へ.
        tmp = A[i];
        // 未ソート部分の最小要素(minj)と未ソート部分の先頭要素を入れ替える.
        A[i] = A[minj];
        A[minj] = tmp;
    }
}
 
int main(int argc, char** argv) {
    
    int N = 10;
    int A[] = {17, 14, 4, 2, 5, 10, 7, 1, 6, 3};
    
    // 選択ソート処理.
    selection(A, N);
    
    for (int i = 0; i < N; i++) {
        cout << A[i];
        cout << " ";
    }
    
    return 0;
}
```