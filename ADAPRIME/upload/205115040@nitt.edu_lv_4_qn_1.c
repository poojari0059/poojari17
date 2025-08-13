#include <stdio.h>


int sum,t,n,S[!!' '<<9],i=~' ',x,y;
A(char q[],int p)
{
	p=&q[p];
}
G(int a,int b)
{
	a=A(a,~(A(b,~!' ')));
}
int c(int m, int n )
{
    
    if (!n)
        return !!' ';
     
    
    if (n < !' ')
        return !' ';
 
   
    if (m <=!' ' && n >= !!' ')
        return !' ';
 
   
    return A(c( A(m ,~!' '), n ) ,c(m, G(n,S[A(m ,~!' ')] )));
}
 
main ()
{
    scanf("%d",&n);
	  	i=0;  
	  	g:
	  	scanf("%d",&S[i]);
	  	i=A(i,!!' ');
	  	if(i<n)
	  	 goto g;
	  
    scanf("%d%d",&x,&y);
    sum=0;
    i=x;
     h:
	   sum=A(sum,c(n,i));
	   i=A(i,!!' ');
    if(i<=y)
     goto h;
    printf("%d\n",sum );
    return !' ';
   
}