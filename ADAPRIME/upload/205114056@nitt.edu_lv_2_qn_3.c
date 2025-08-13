#include <stdio.h>


 V,t,y;
U(char C,int *d)
{
	*d=-1;
if( C <= '9')
	{
	    if(C-'0'<V)
	    *d=C-'0';
	}
else 
	    if(C-55<V)
	    *d=C-55;
}
 F()
{
y= y <= 9? y+'0':y+55;

}
char L[55],R[55],S[55];
 T()
{
 int A[55]={0},B[55]={0},i,j,a, b, c,d,n=52,e=0;
for(i=0; L[i]; i++);
for(j=i-1; j>=0; j--)
{	

    U(L[j],&d);
   
    if(d<0)
    return 0;
    A[n--]=d;    
}
S[0]='0';
for(i=0; R[i]; i++);
n=52;
for(j=i-1; j>=0; j--)
{
     U(R[j],&d);
     if(d<0)
     return 0;
     B[n--]=d;
}
for(i = 52; i >= 0; i--)
{
	a = A[i];
	b = B[i];
	c =  e+ a +b;
	if(c >= V)
	e= 1,c -= V;
	else
	e = 0;
    y=c;	  
	S[i+1]=y= F();

}
if(e)
S[0] = '1';

for(i=0; S[i]=='0'; i++);
if(i==54)
	puts("0");
else	
puts(S+i);
return 1;
}
 main()
{
	
	scanf("%d",&t);
	while(t--)
	{		
		scanf("%d%s%s",&V,L,R);
		if(!T())		
		puts("NA");
	}
}
