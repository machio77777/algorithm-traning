# 初等的整列.
ソートアルゴリズムを考える時には、以下の点に留意する必要がある.
- 計算量と安定性.
- データの列を保持する1つの配列以外にメモリが必要にならないか.
- 入力データの特徴が計算量に影響しないか.

## :one: 挿入ソート.
- 安定なソートアルゴリズムだが、計算量O(nの2乗)となる.
- ある程度整列されたデータに対しては高速に動作する特徴がある.
```cpp
#include <iostream>

using namespace std;

// 配列要素を順番に出力.
void trace(int A[], int N) {
    int i;
    for (i = 0; i < N; i++) {
        if (i > 0) {
            printf(" "); // 隣接要素の間に1つの空白を出力.
        }
        printf("%d", A[i]);
    }
    printf("\n");
}

// [挿入ソート]
// [ソート済みの部分列]と[未ソートの部分列]に分割.
// 先頭の要素はソート済みと見なす.
// 1. 未ソート部分の先頭から要素を1つ取り出しvに記録.
// 2. ソート済みの部分において、vより大きい要素を後方へ1つずつ移動.
// 3. 最後に空いた位置に「取り出した要素v」を挿入.
void insert(int A[], int N) {
    
    int i; // 未ソートの部分列の先頭を表すループ変数.
    int v; // A[i]の値を一時的に保持しておくための変数.
    int j; // ソート済み部分列からvを挿入するための位置を探すループ変数.
    
    // 先頭要素[0]はソート済みとみなすためi=1から開始.
    for (i = 1; i < N; i++) {
        // 未ソート部分の先頭要素[i]をvに一時保存.
        v = A[i];
        j = i - 1;
        // ソート済みの部分列の後方から大小比較を繰り返す.
        while (j >= 0 && A[j] > v) {
            A[j + 1] = A[j];
            j--;
        }
        A[j + 1] = v;
        trace(A, N);
    }
}


// 挿入ソート - [ソート済みの部分列]と[未ソートの部分列]に分割.
int main(int argc, char** argv) {
    
    int N = 10;
    int A[] = {17, 14, 4, 2, 5, 10, 7, 1, 6, 3};
    
    trace(A, N);
    
    // 挿入ソート処理.
    insert(A, N);
    
    return 0;
}
```

## :two: バブルソート.
- 安定なソートアルゴリズムだが、計算量O(nの2乗)となる.
```cpp
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
```

## :three: 選択ソート.
- 安定なソートアルゴリズムだが、計算量O(nの2乗)となる. 
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

## :four: シェルソート.
- 一定間隔離れた要素のみを対象とした挿入ソート.
```cpp
#include <iostream>
#include <vector>

using namespace std;

long long cnt;
vector<int> G;

// [挿入ソート]
void insertSort(int A[], int N, int g) {
    
    // 間隔gを指定した挿入ソート.
    for (int i = g; i < N; i++) {
        int tmp = A[i];
        int j = i - g;
        while (j >= 0 && A[j] > tmp) {
            A[j + g] = A[j];
            j -= g;
            cnt++;
        }
        A[j + g] = tmp;
    }
}

// [シェルソート]
void shellSort(int A[], int N) {
    // 数列Gを生成.
    for (int h = 1; ; ) {
        if (h > N) {
            break;
        }
        G.push_back(h);
        h = 3*h + 1;
    }
    
    // 逆順にG[i]=gを指定.
    for (int i = G.size()-1; i >= 0; i--) {
        insertSort(A, N, G[i]);
    }
}

int main(int argc, char** argv) {
    
    int N = 13;
    int A[] = {17, 14, 4, 2, 5, 10, 7, 1, 6, 3, 9, 6, 11};
    cnt = 0;    

    // シェルソート.
    shellSort(A, N);
    
    for (int i = 0; i < N; i++) {
        cout << A[i];
        cout << " ";
    }
    return 0;
}
```
