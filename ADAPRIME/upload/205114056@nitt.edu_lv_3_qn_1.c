#include <stdio.h>

int min(int x, int y)
{
  return  y + ((x - y) & ((x - y) >> (31)));
}

int max(int x, int y)
{
  return x - ((x - y) & ((x - y) >>(31)));
}
int m(int x , int y)
{
   
   if(! y )
     return 0 ;
 

   if( max( y , 0 ) )
     return( x + m ( x , y - 1)) ;
  
  
   if( ! max( y , 0 ))
     return (- m ( x ,  - y )) ;
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t)
	{
		int a,b,c;
		scanf("%d%d%d",&a,&b,&c);
		if(!(a-1))
		{
			printf("%d\n",b+c);
		}
		if(!(a-2))
		{
			printf("%d\n",b-c);
		}
		if(!(a-3))
		{
			printf("%d\n", m(b,c));
		}
		 if(!(a-4))
		{
			printf("%d\n",b/c);
		}
		 if(!(a-5))
		{
			if(!(b-c))
			printf("0\n");
			if((b-c))
			printf("%d\n",max(b,c));
		}
		 if(!(a-6))
		{
			if(!(b-c))
			printf("0\n");
			if((b-c))
			printf("%d\n",min(b,c));
		}
		if(!(a-7))
		{
			int count = 0 ;
			count  =  b / c ;
			b  =  b - m(count , c) ;
			printf("%d\n" , b);
		
		}
		t=t-1;
	}
	return 0;
}