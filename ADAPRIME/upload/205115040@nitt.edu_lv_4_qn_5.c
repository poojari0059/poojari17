#include <stdio.h>

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

Len(char a[!!' '<<9])
{
	int i=!' ';
	L:
		i=A(i,!!' ');
	if(a[i])
	 goto L;	
	return i;
}

int flag,t,n,m,i,len[!!' '<<9],i,j,k,l,o,p,x,y,temp;
char a[!!' '<<9][!!' '<<9];
main()
{
	scanf("%d",&t);

		M:
		scanf("%d%d",&n,&m);
		i=!' ';
		N:
		
	    	scanf("%s",a[i]);
	    	len[i]=Len(a[i]);
		
		i=A(i,!!' ');
		if(i<n)
		 goto N;
		i=!' ';
		temp=!' ';
		j=!' ';
		
		l0:
			k=!' ';
			
			flag=!' ';
			temp=A(temp,j);
			i=temp;
		
			j=!' ';
			m0:
				if(i>=n)
				 {
				  flag=!!' '; 	
				  goto m1;
			     }
			     
				k=A(k,len[i]);
			
				j=A(j,!!' ');
				i=A(i,!!' ');
				if(A(k,S(j,!!' '))<=m)
				 goto m0;
			m1:	
				
			
			if(k==m&&j==!!' ')
			{
				printf("%s\n",a[temp]);
			}
			else
			{
			
			if(flag==!' ')
			{
			  k=S(k,len[S(i,!!' ')]);
			  j=S(j,!!' ');
		    }
		    
		
			p=S(m,k);
			if(j==!!' ')
			{
				y=!' ';
				x=S(m,k);
			}
			else
			{
			
			x=p/(S(j,!!' '));
			y=p%(S(j,!!' '));
			
			}
			
		    l=temp;
		    O:
			
				printf("%s",a[l]);
				
				if(l!=A(temp,S(j,!!' '))&&j!=!!' ')
				{
				     o=!' ';
				    P: 
					
					printf("0");
					o=A(o,!!' ');
					if(o<x)
					 goto P;
				if(y!=!' ')
				{
					printf("0");
					y=S(y,!!' ');
				}
			    }
			    else if(j==!!' ')
			    {
			    		
			    	 for(o=!' ';o<x;o++)
					   printf("0");
			    	
				}
			l=A(l,!!' ');
			if(l<A(temp,j))
			 goto O;
			printf("\n");
		   }
			if(A(temp,j)<n)
			 goto l0;
		
		
		t=S(t,!!' ');
		if(t)
		 goto M;
	
}