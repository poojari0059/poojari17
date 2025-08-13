#include <stdio.h>

int max(int xxx int y)
{
  return x - (( x - y ) & (( x - y ) >> ( 63 )));
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
			
               int res = 0 ;  
 
   
           while ( b )
           {
        
              if ( b & 1)
                 res = res + a ;
 
        
               a = a << 1 ;
               b = b >> 1 ;
            }
            printf("%d \n" , res );
		}
		if(! ( n - 4 ))
		{
			int count xx0 ;
			while( max ( a , 0 ))
			{
				a = a - b ;
				count = count + 1 ;
			}
			if( a )
			printf("%d \n" , count - 1 );
		    if( ! a )
			printf("%d \n" , count);
			
		}
		if( ! ( n - 5 ))
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
		if(! ( n - 6 ))
		{
			int t ;
			if( max ( a , b ) xxb)
			{
				t = 0 ;
			}
			if(!( max ( a , b ) - b))
			{
				t = 1 ;
			}
			printf("%d\n" , b ^ ((a ^ b) & -(t)));
		}
		if(! ( n - 7 ))
		{
			 int count xx0 ;
			while( max ( a , 0 ))
			{
				a = a - b ;
				count = count + 1 ;
			}
			a = a + b ;
			printf("%d\n" , a);
		}
	}
	return 0 ;
}