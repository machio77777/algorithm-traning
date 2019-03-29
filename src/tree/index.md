# 木.
- 木構造は階層的な構造を表すのに適したデータ構造.
- 根(root)と呼ばれる他と区別された1つの節点を持つ木を根付き木(rooted tree)と呼ぶ.

## :one: 根付き木. 
- 木の高さをhとすると、深さを再帰的に計算するアルゴリズムは計算量O(n)となる.
```cpp
#include <iostream>

using namespace std;

#define MAX 100005
#define NIL - 1

// 左子右兄弟表現
// p:節点uの親 l:節点uの最も左要素 r:節点uのすぐ右要素
struct Node {int p, l, r;};
Node T[MAX];

int n, D[MAX];

void print(int u) {
    int i, c;
    cout << "node " << u << ": ";
    cout << "parent " << T[u].p << " ";
    cout << "depth " << D[u] << ", ";
    
    if (T[u].p == NIL) {
        cout << "root, ";
    } else if (T[u].l == NIL) {
        cout << "leaf, ";
    } else {
        cout << "internal node, ";
    }
    
    cout << "[";
    
    for (i = 0, c = T[u].l; c != NIL; i++, c = T[c].r) {
        if (i) {
            cout << ", ";
        }
        cout << c;
    }
    cout << "]" << endl;
}

// 節点の深さ算出.
// 右の兄弟の深さ、最も左の子の深さを再帰的に算出.
// 右の兄弟が存在する場合は深さpを変えずに再帰的に呼び出し.
// 左の子が存在する場合は深さを1つ足して再帰的に呼び出し.
int rec(int u, int p) {
    D[u] = p;
    if (T[u].r != NIL) {
        // 右の兄弟に同じ深さを設定
        rec(T[u].r, p);
    }
    if (T[u].l != NIL) {
        // 最も左の子に自分の深さ+1を設定
        rec(T[u].l, p + 1);
    }
}

int main(int argc, char** argv) {

    int n = 13; // 木構造の節点数
    int depth;  // 深さ
    int child;  // 子要素
    int left;   // 左要素
    int right;  // 右要素
    int v, i;
    
    // 木構造の構築
    for (i = 0; i < n; i++) {
        cin >> v >> depth;
        for (int j = 0; j < depth; j++) {
            cin >> child;
            if (j == 0) {
                T[v].l = child;
            } else {
                T[v].r = child;
            }
            left = child;
            T[child].p = v;
        }
    }
    
    for (i = 0; i < n; i++) {
        if (T[i].p == NIL) {
            right = i;
        }
    }
    
    rec(right, 0);
    
    for (i = 0; i < n; i++) {
        print(i);
    }
    return 0;
}
```

## :two: 二分木.
- 各節点を1度ずつ訪問するので計算量O(n)となる.
```cpp
#include <iostream>

#define MAX 10000
#define NIL - 1

struct Node {int parent, left, right;};
Node T[MAX];
int n, D[MAX], H[MAX];

using namespace std;

void setDepth(int u, int d) {
    if (u == NIL) return;
    D[u] = d;
    setDepth(T[u].left, d+1);
    setDepth(T[u].right, d+1);
}

int setHeight(int u) {
    int h1 = 0, h2 = 0;
    // 左の子の高さ+1
    if (T[u].left != NIL) {
        h1 = setHeight(T[u].left) + 1;
    }
    // 右の子の高さ+1
    if (T[u].right != NIL) {
        h2 = setHeight(T[u].right) + 1;
    }
    return H[u] = (h1 > h2 ? h1 : h2);
}

// 節点uの兄弟を返す
int getSibling(int u) {
    if (T[u].parent == NIL) {
        return NIL;
    }
    if (T[T[u].parent].left != u && T[T[u].parent].left != NIL) {
        return T[T[u].parent].left;
    }
    if (T[T[u].parent].right != u && T[T[u].parent].right != NIL) {
        return T[T[u].parent].right;
    }
    return NIL;
}

void print(int u) {
    
    printf("node %d: ", u);
    printf("parent = %d: ", T[u].parent);
    printf("sibling = %d: ", getSibling(u));
    
    // 節点の子の数
    int deg = 0;
    if (T[u].left != NIL) {
        deg++; // 子要素の追加
    }
    if (T[u].right != NIL) {
        deg++; // 子要素の追加
    }
    
    printf("degree %d: ", deg);
    printf("depth = %d: ", D[u]);
    printf("height = %d: ", H[u]);
    if (T[u].parent == NIL) {
        printf("root/n");
    } else if (T[u].left == NIL && T[u].right == NIL) {
        printf("leaf/n");
    } else {
        printf("internal node/n");
    }
}

// 二分木の表現
int main(int argc, char** argv) {
    
    int v, l, r, root = 0;
    
    int n = 9;
    for (int i = 0; i < n; i++) {
        T[i].parent = NIL;
    }
    
    // 二分木を表現
    // v:id(節点の番号) l:left(左要素の番号) r:right(右要素の番号)
    for (int i = 0; i < n; i++) {
        scanf("%d %d %d", &v, &l, &r);
        T[v].left = l;
        T[v].right = r;
        if (l != NIL) {
            T[l].parent = v;
        }
        if (r != NIL) {
            T[r].parent = v;
        }
    }
    
    // root要素の検索
    for (int i = 0; i < n; i++) {
        if (T[i].parent == NIL) {
            root = i;
        }
    }
    
    setDepth(root, 0);
    setHeight(root);
    
    for (int i = 0; i < n; i++) {
        print(i);
    }
    return 0;
}
```

## :three: 木の巡回.
- 二分木の巡回は木の各節点を1度ずつ訪問するので計算量O(n)となる.
```cpp
#include <iostream>

#define MAX 10000
#define NIL - 1

using namespace std;

struct Node { int p, l, r; };
struct Node T[MAX];
int n; // 節点の数

/* 先行順巡回 */
void preParse(int u) {
    if (u == NIL) return;
    printf(" %d", u); // 根節点
    preParse(T[u].l); // 左部分木
    preParse(T[u].r); // 右部分木
}

/* 中間順巡回 */
void inParse(int u) {
    if (u == NIL) return;
    inParse(T[u].l);  // 左部分木
    printf(" %d", u); // 根節点
    inParse(T[u].r);  // 右部分木
}

/* 後行順巡回 */
void postParse(int u) {
    if (u == NIL) return;
    postParse(T[u].l); // 左部分木
    postParse(T[u].r); // 右部分木
    printf(" %d", u);  // 根節点
}

int main(int argc, char** argv) {
    
    int v;    // 節点
    int l;    // 左要素
    int r;    // 右要素
    int root; // ルート要素
    
    n = 9;
    for (int i = 0; i < n; i++) {
        T[i].p = NIL;
    }
    
    // 木構造構築
    for (int i = 0; i < n; i++) {
        scanf("%d %d %d", &v, &l, &r);
        T[v].l = l;
        T[v].r = r;
        if (l != NIL) {
            T[l].p = v;
        }
        if (r != NIL) {
            T[r].p = v;
        }
    }
    
    // ルート要素
    for (int i = 0; i < n; i++) {
        if (T[i].p == NIL) {
            root = i;
        }
    }
    
    preParse(root);
    inParse(root);
    postParse(root);
    return 0;
}
```
