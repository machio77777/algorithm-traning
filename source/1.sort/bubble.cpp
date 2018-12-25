#include <iostream>

using namespace std;

// [バブルソート]
// 挿入ソート同様に[ソート済みの部分列]と[未ソートの部分列]に分けられる.
// 未ソート部分が無くなる迄、以下の処理を繰り返す.
// 1. 配列の末尾から隣接する要素を順番に比べ、大小関係が逆の場合は入れ替える.
void bubble(int A[], int N) {
    
    // i:未ソート部分の先頭インデックス.
    for (int i = 0; i < N; i++) {
        // j:未ソート部分の隣り合う要素を比較するインデックス.
        // 配列Aの末尾(N-1)からi+1までを移動.
        for (int j = N - 1; j >= i + 1; j--) {
            // 隣り合う要素を比較.
            if (A[j] < A[j - 1]) {
                int tmp = A[j];
                A[j] = A[j - 1];
                A[j - 1] = tmp;
            }
        }
    }
}
 
int main(int argc, char** argv) {
    
    int N = 10;
    int A[] = {17, 14, 4, 2, 5, 10, 7, 1, 6, 3};
    
    // バブルソート処理.
    bubble(A, N);
    
    for (int i = 0; i < N; i++) {
        cout << A[i];
        cout << " ";
    }
    
    return 0;
}


