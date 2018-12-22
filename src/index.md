
# :clipboard: C++言語入門.

C++言語プログラミングのための基礎知識をまとめたページ.
- 最終更新日：2018.12.22.

:small_blue_diamond: C言語とC++言語.
- C言語は1970年代前半に生まれ、比較的低水準の言語と言われている.
- C言語を学ぶことで、コンピュータの内部構造をより深く理解することが可能.
- C++言語はC言語を拡張したもので、オブジェクト指向がサポートされている.
- 性能に関して妥協がなく、ハードウェアの性能を最大限に引き出せる.

## :one: C++言語でのHello World.
- まずはコンソール上で「Hello, World」のコンパイルから実行してみる.
```cpp
#include <iostream>

using namespace std;

int main(int argc, char** argv) {
    // 名前空間stdで定義されたcoutで文字出力
    // ::はスコープ演算子
    std::cout << "Hello, World\n";
    cout << "Hello, World" << endl;
    return 0;
}
```

上のサンプルプログラムで注意すること.
- 全角と半角、大文字と小文字は区別される.
- main()に書かれた処理が実行される.
- std::cout << "Hello, World";は「Hello, World」を画面表示するという意味.
- 文字列は二重引用符「"」で囲む.
- \nは改行コードを意味し、<< endl;でも改行することができる.
- 処理の最後には必ずセミコロンを書く.
- coutを利用するためには、ヘッダ(#include)を記述.
- iostreamは画面出力やキーボード入力機能が定義されたライブラリ.

## :two: 

## :small_orange_diamond:

## :small_orange_diamond:

## :small_orange_diamond: 参考.
- 基礎からしっかり学ぶC++の強化書 C++14対応.