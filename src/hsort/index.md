
# :clipboard: 高等的数列.

## :one: マージソート.
- 指定要素を部分配列に分解してソート、最後にソート済み配列をマージするので計算量O(nlogn).
```cpp
#include <iostream>

using namespace std;

#define MAX 500000
#define SENTINEL 200000000

int L[MAX/2+2], R[MAX/2+2];
int cnt;

// 得られた2つのソート済み部分配列をmergeで統合.
// 既にソート済みを利用することで計算量O(n1+n2)となるようなマージアルゴリズム.
void merge(int A[], int n, int left, int mid, int right) {
    
    int n1 = mid - left;
    int n2 = right - mid;
    
    // 部分配列に入れ替え
    for (int i = 0; i < n1; i++) {
        L[i] = A[left + i];
    }
    for (int i = 0; i < n2; i++) {
        R[i] = A[mid + i];
    }
    
    // 番兵の設定
    L[n1] = R[n2] = SENTINEL;
    
    int i = 0, j = 0;
    for (int k = left; k < right; k++) {
        cnt++;
        // 分割された最小要素同士を比較
        if (L[i] <= R[j]) {
            A[k] = L[i++];
        } else {
            A[k] = R[j++];
        }
    }
}

// [マージソート]
// 指定されたn個の要素を含む部分配列をそれぞれn/2個に分割.
// 分割された部分配列それぞれをmergeSortでソート.
void mergeSort(int A[], int n, int left, int right) {
    
    if (left+1 < right) {
        int mid = (left + right) / 2;
        mergeSort(A, n, left, mid);
        mergeSort(A, n, mid, right);
        merge(A, n, left, mid, right);
    }
}

int main(int argc, char** argv) {
    
    int A[] = {9, 6, 7, 2, 5, 1, 8, 4, 2};
    int n = 9;
    cnt = 0;
    
    mergeSort(A, n, 0, n);
    
    // 実行結果 1 2 2 4 5 6 7 8 9
    for (int i = 0; i < n; i++) {
        cout << A[i];
        cout << " ";
    }
    return 0;
}
```

## :two: パーティション.
- jがpからr-1まで毎回1回つ後方に移動するので、計算量O(n)のアルゴリズムとなる.
```cpp
#include <iostream>

using namespace std;

int A[] = {13, 19, 9, 5, 12, 8, 7, 4, 21, 2, 6, 11};
int n = 12;

// 基準となるx以下の要素がpからiまでの範囲(iを含む)
// xより大きな要素がi+1からjまでの範囲(jを含まない)
int partition(int p, int r) {
    
    // 基準値は最後方要素
    int x = A[r];
    // グループ1(x以下の要素)中の最大Idx
    int i = p - 1;
    // グループ2(xより大きい要素)中の最大Idx-1
    int j;
    
    // 毎回の計算ステップでは必ずjを+1してA[j]をどちらのグループに属するか判定
    int t;
    for (j = p; j < r; j++) {
        // A[j]がx以下の場合、A[j]とA[i]を交換
        if (A[j] <= x) {
            i++;
            t = A[i];
            A[i] = A[j];
            A[j] = t;
        }
        
        // A[j]がxよりも大きい場合、要素の移動はなし
    }
    t = A[i + 1], A[i + 1] = A[r]; A[r] = t;
    return i + 1;
}

int main(int argc, char** argv) {
    
    int q = partition(0, n - 1);
    
    // [実行結果] 9 5 8 7 4 2 6 [11] 21 13 19 12
    for (int i = 0; i < n; i++) {
        
        if (i == q) {
            cout << "[";
        }
        cout << A[i];
        if (i == q) {
            cout << "]";
        }
        cout << " ";
    }
    return 0;
}
```

## :three: クイックソート.
- 一般的に最も高速なソートアルゴリズムと言われ、計算量O(nlogn)となる.
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
