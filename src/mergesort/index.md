
# :closed_book: マージソート.

:clipboard:指定要素を部分配列に分解してソート.  
:clipboard:最後にソート済み配列をマージするので計算量O(nlogn).

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