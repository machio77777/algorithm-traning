#include <iostream>
#include <vector>

using namespace std;

int top, S[1000];

// 要素の追加
void push(int x) {
    // topを加算して要素挿入.
    S[++top] = x;
}

// 要素の取得
int pop() {
    top--;
    // indexがtopの要素取得
    return S[top+1]; 
}

int main(void){
    
    vector<string> strList = { "7", "3", "+", "10", "8", "-", "7", "4", "*" };
    
    int a, b;
    top = 0;
    
    for (int i = 0; i < strList.size(); i++) {
        if (strList[i] == "+") {
            a = pop();
            b = pop();
            cout << a + b << endl;
            push(a + b);
        } else if (strList[i] == "-") {
            b = pop();
            a = pop();
            cout << a - b << endl;
            push(a - b);
        } else if (strList[i] == "*") {
            a = pop();
            b = pop();
            cout << a * b << endl;
            push(a * b);
        } else {
            int num = stoi(strList[i]);
            push(num);
        }
    }
    printf("%d\n", pop());
    return 0;
}
