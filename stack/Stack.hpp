template <typename T>
class Stack
{
public:
    Stack();
    void push(T element);
    T pop();

private:
    T stack[];
};