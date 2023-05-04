#include <iostream>
#include "./stack/Stack.cpp"

using namespace std;

int main(int argc, char *argv[])
{
    char el = '1';

    Stack<char> c1;
    cout << c1.push(el);

    return 0;
}