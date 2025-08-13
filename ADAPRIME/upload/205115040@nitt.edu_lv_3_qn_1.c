#include <stdio.h>


int max(int x , int y)
{
  return x - (( x - y ) & (( x - y ) >> ( 63 )));
}
int multi(int x , int y)
{
   
   if(! y )
     return 0 ;
 

   if( max( y , 0 ) )
     return( x + multi ( x , y - 1)) ;
  
  
   if( ! max( y , 0 ))
     return (- multi ( x ,  - y )) ;
}


int main()
{
	int t , n , a , b ;
	scanf(" %d ", & t);
	t = t + 1 ;
	while(t = t - 1)
	{
		scanf("%d %d %d" , & n , & a , & b );
		if(! ( n - 1 ))
		{
			printf("%d \n" , a + b );
		}
		if(! ( n - 2 ))
		{
			printf("%d \n" , a - b );
		}
		if( ! ( n - 3 ))
		{
		
            printf("%d \n" , multi(a , b)) ;
		}
		if(! ( n - 4 ))
		{
			
			printf("%d \n" , a / b);
			
		}
		if( ! ( n - 5 ))
		{
			if(! (a - b))
			{
				printf("0\n") ;
		    }
		    if(a - b)
		    {
			int t ;
			if( max ( a , b ) - b)
			{
				t = 0 ;
			}
			if(!( max ( a , b ) - b))
			{
				t = 1 ;
			}
			printf("%d\n" , a ^ ((a ^ b) & -(t)));
		   }
		}
		if(! ( n - 6 ))
		{
			if(! ( a - b))
			{
				printf("0\n") ;
		    }
		    if(a - b)
		    {
			int t ;
			if( max ( a , b ) - b)
			{
				t = 0 ;
			}
			if(!( max ( a , b ) - b))
			{
				t = 1 ;
			}
			printf("%d\n" , b ^ ((a ^ b) & -(t)));
		   }
		}
		if(! ( n - 7 ))
		{
			 int count = 0 ;
			count = a / b ;
			
			a = a - multi ( count , b)  ;
			
			printf("%d\n" , a);
		}
	}
	return 0 ;
}