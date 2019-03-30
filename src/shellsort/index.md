
# :closed_book: シェルソート.

:clipboard:一定間隔離れた要素のみを対象とした挿入ソート.

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
