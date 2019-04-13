
# :notebook: 探索.

:pushpin:**二分探索木-探索の特徴.**
- 木の高さをhとすると、計算量O(h)のアルゴリズムとなる.

:pushpin:**二分探索木-探索の手順.**

:one:根を起点としてfindを呼び出し、根から葉に向かって節点を探索.  
:two:節点xより与えられたキーが小さい場合は左の子、それ以外の場合は右の子へ移動して探索.  
:three:キーが存在しない場合はNILを返す.

```cpp
Node * find(Node *u, int k) {
    while (u != NIL && k != u->key) {
        // 現在調べている節点uのキーより与えられたキーkが小さい場合は左要素へ移動
        if (k < u->key) {
            u = u->left;
        // それ以外の場合は右要素へ移動し探索
        } else {
            u = u->right;
        }
    }
    return u;
}
```

二分探索木を作るアルゴリズム.

```cpp
#include <stdio.h>
#include <stdlib.h>
#include <string>
#include <iostream>

using namespace std;

struct Node {
    int key;
    Node *right, *left, *parent;
};

Node *root, *NIL;

void insert(int k) {
    // 省略
}

void inorder(Node *u) {
    // 省略
}

void preorder(Node *u) {
    // 省略
}

int main(int argc, char** argv) {
    
    int n, i, x;
    string com;
    
    scanf("%d", &n);
    
    for (i = 0; i < n; i++) {
        cin >> com;
        if (com[0] == 'f') {
            scanf("%d", &x);
            // 根を起点にfind呼び出し.
            Node *t = find(root, x);
            if (t != NIL) {
                printf("yes\n");
            } else {
                printf("no\n");
            }
        } else if (com == "insert") {
            scanf("%d", &x);
            insert(x);
        } else if (com == "print") {
            inorder(root);
            printf("\n");
            preorder(root);
            printf("\n");
        }
    }
    return 0;
}
```

:mag_right:対象ソースは以下に格納.
```
/source/7.binary/search.cpp
```