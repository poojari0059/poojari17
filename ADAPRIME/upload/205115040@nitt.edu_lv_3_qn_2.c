#include <stdio.h>

int max(int x , int y)
{
  return x - (( x - y ) & (( x - y ) >> ( 31 )));
}
int multi(int x , int y)
{
   
   if(! y )
     return 0 ;
 

   if( max( y , 0 ) )
     return ( x + multi ( x , y - 1)) ;
  
  
   if( ! max( y , 0 ))
     return - multi ( x ,  - y ) ;
}
int cal(int n , int a , int b)
{
	

		
		if(! ( n - 1 ))
		{
			return a + b ;
		}
		if(! ( n - 2 ))
		{
			return a - b ;
		}
		if( ! ( n - 3 ))
		{
			
            return multi(a , b)  ;
		}
		if(! ( n - 4 ))
		{
			
			return a / b ;
			
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
			return a ^ ((a ^ b) & - (t)) ;
		    
		}
		if(! ( n - 6 ))
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
			return b ^ ((a ^ b) & -(t));
		   
		}
		if(! ( n - 7 ))
		{
			int count =0 ;
			count = a / b ;
			a = a - multi(count , b) ;
			return a ;
		}
	
	
}
int main()
{
	int t , x , m , n , sum , i , value , value1 , temp , temp1 ;
	scanf("%d" , &  t) ;
	t = t + 1 ;
	while(t = t - 1)
	{
		sum = 0 ;
		scanf("%d%d%d" , & x , & m , & n) ;
		
		if( ! n)
		{
			printf("0 0\n") ;
		}
		if(n)
		{
		
	    i = 1 ;
		while(cal( 5 , sum , n ) - sum)
		{
			sum = sum + cal(3 , i , x) ;
			i = i + 1 ;
		}
		i= i - 1 ;
		sum = sum - cal(3 , i , x) ;
		sum = n - sum ;
		value = sum / i ;
		
		value1 = cal(7 , sum , i) ;
		if(value1)
		{
			value = value + 1 ;
		}
		temp = n / m ;
		temp1 = cal(7 , n , m) ;
		if(temp1)
		{
			temp = temp + 1 ;
		}
		printf("%d %d\n" , value , temp) ;
	   }
	}
	return 0 ;
}