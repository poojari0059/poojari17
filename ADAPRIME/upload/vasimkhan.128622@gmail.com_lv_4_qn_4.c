#include <stdio.h>

N['(('];
U['(('];

Z(j,i)
{
    asm ( "imul %%ebx, %%eax;" : "=a" (j) : "a" (j) , "b" (i) );

}

A(char c[],int i)
{
   i=&c[i];
}

V()
{
    N['\'']=A(N['\''],')'%'(');
	if(Z(N['\''],N['\''])<=N[' '])
        V();
}
H(int j, int b[], int a[],int i,int k,int m){
    if(j!=m){
        if(j!=i)
        {
            b[k]=a[j];
            k=A(k,')'%'(');
        }

        H(A(j,')'%'('),b,a,i,k,m);

    }
}

O(int i,int a[], int m, int W){
    if(i!=m){

        int b['(('];
        H(')'%'(',b,a,i,')'%'(',m);
        b[!'(']=b[A(m,N['{']=~!'(')]=')'%'(';
        X( b ,A(m,N['{']),A(W , Z( Z(a[A(i,N['{'])],a[i]), a[A(i,')'%'(')])) );

        O(A(i,')'%'('),a,m,W);
    }
}
X( int a[], int m, int W)
{
	if(m==')'%'(' & N[' ']<W){
            N[' ']=W;
	}
    O(')'%'(',a,m,W);
}

T(){
    scanf("%d",&N['(']);
    return N['('];
}

G(i){
    U[i]=T();
    if(i!=N['"']){
        G(A(i,')'%'('));
    }
}
W(){

		N['"']=T();
		U[N[' ']=!'(']=U[A(N['"'],')'%'(')]=')'%'(';
		G(')'%'(');
        X(U,A(N['"'],')'%'('),N['\'']=!'(');
        V();
        printf("%d\n",A(N['\''],N['{']));

        N['.']=A(N['.'],')'%'(');
        if(N['.']!=N['\\'])
            W();
}

main()
{
    N['\\']= T();
	W();
	exit(!'(');
}
