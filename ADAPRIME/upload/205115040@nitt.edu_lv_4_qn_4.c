#include <stdio.h>


A(char q[],int p)
{
	p=&q[p];
}
S(int a,int b)
{
	a=A(a,~(A(b,~!' ')));
}
int max=!'[ ';
m1(int a,int b )
{

 return sizeof(char [a][b]);
}
void findmax(int a[!!' '<<9],int n,int m,int sum)
{
	int i;

	if(m==!!' ')
	{

		if(max<sum)
		 max=sum;
		 return;
	}
	int j;
	i=!!' ';
	if(i<m)
	{
		int k=!!' ',b[!!' '<<9];
		lc:
		   k=!!' ';
		    b[!'[ ']=!!' ';
		    j=!!' ';
		  
		    lm:
			
				if(j!=i)
				 {
				    b[k]=a[j];
			
				    
				    k=A(k,!!' ');
			     }
			j=A(j,!!' ');     
			
			if(j<m)
			 goto lm;	  
				
			b[k]=!!' ';	
			
			findmax(b,n,k,A(sum,m1(a[S(i,!!'[')],m1(a[i],a[A(i,!!'[')]))));
			
			i=A(i,!!'[');
			if(i<m)
			 goto lc;
	}
}

int main()
{
	int t,n,i;
	scanf("%d",&t);
	if(t)
	{
		lb:
		max=!'[ ';
		int a[!!' '<<9];
		scanf("%d",&n);
		a[!'[ ']=!!'[';
		a[A(n,!!'[')]=!!'[';
		i=!!'[';
		lf:
		
			scanf("%d",&a[i]);
			i=A(i,!!'[');
			if(i<=n)
			 goto lf;
		
		findmax(a,n,A(n,!!'['),!'[ ');
	    i=!'[ ';
		
			ld:
			i=A(i,!!'[');	
			
			if(m1(i,i)<=max)
			 goto ld;
		
		i=S(i,!!'[');
		printf("%d\n",i);
		t=S(t,!!'[');
		if(t)
		 goto lb;
	}
	return !'[ ';
}