#include <stdio.h>

int ts;
A(char q[],int p)
{
	p=&q[p];
}
S(int a,int b)
{
	a=A(a,~(A(b,~!' ')));
}

M(int a,int b )
{

 return sizeof(char [a][b]);
}

 pqr(int a)
 {
 	a=a>!' '?a:S(!' ',a);	 
 }
f(int arr[], int i, int s)
{
    int u,v;
    if (i==!' ')
        return pqr(S(S(ts,s),s));
 
    u=f(arr, S(i,!!' '), A(s,arr[S(i,!!' ')]));
    v=f(arr, S(i,!!' '), s);
    return (u<v)?u:v;
}
 

findMin(int arr[], int n)
{
   
    int i=!' ',p;
    
    p=f(arr, n, !' ');
   
    return A(S(ts,p)>>1,p);
}
 

main()
{
    int a[!!' '<<9],n,i,t ;
    scanf("%d",&t);
    M:
    scanf("%d",&n);
    i=!' ';
    ts=!' ';
    N:
    	scanf("%d",&a[i]);
    	ts =A(ts,a[i]);
     i=A(i,!!' ');	
	if(i<n)
	 goto N;
    
    printf("%d\n", findMin(a, n));
    t=S(t,!!' ');
    if(t!=!' ')
     goto M;
    return !' ';
}