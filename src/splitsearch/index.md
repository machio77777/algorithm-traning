
# :blue_book: 二分探索.

:clipboard:Sの要素が昇順ソートされている制約を利用した二分探索は計算量O(log2N).

```cpp
#include <iostream>

using namespace std;

int S[] = {1, 2, 3, 5, 6, 7, 8, 11, 19, 20, 44, 90};
int n = 12;

// 二分探索
int binarySearch(int key) {
    
    int left = 0;
    int right = n;
    int mid;
    
    while (left < right) {
        mid = (left + right) / 2;
        
        // 中間要素とkeyが同一の場合
        if (key == S[mid]) {
            return 1;
        // 後半部分を検索させるよう制御
        } else if (key > S[mid]) {
            left = mid + 1;
        // 前半部分を検索させるよう制御
        } else {
            right = mid;
        }
    }
    return 0;
}

int main(int argc, char** argv) {
    
    int T[] = {4, 8, 1, 88, 43, 7, 9, 3, 90};
    int q = 9;
    int sum = 0;
    
    for (int i = 0; i < q; i++) {
        if (binarySearch(T[i]) == 1) {
            sum++;
        }
    }
    cout << sum << endl;
    return 0;
}
```