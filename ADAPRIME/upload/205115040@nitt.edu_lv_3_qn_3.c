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
			int count = 0 ;
			count = a / b ;
			a = a - multi(count , b) ;
			return a ;
		}
	
	
}
int main()
{
	int a[2003] , b[2003] , t , n , i , j , first ;
	scanf("%d" , & t);
	t = t + 1 ;
	while(t = t - 1)
	{
		scanf("%d" , & n);
		int i = 0 ;
		
		while(i - n - n)
		{
			scanf("%d" , & a[i]);
			b[i] = i + 1 ;
			a[i] = cal(3 , a[i] , i + 1); 
			i = i + 1 ;
		}
		i = n + n - 1 ;
          while (i){     
             first = 0 ;                
          
               j = 0 ;
               while (cal(5 , j , i)- j  || !(i - j)){                    
                  if(cal(5 , a[j] , a[first])- a[first] || !(a[i] - a[first]))         
                    first = j ;
                    j = j + 1 ;
                           }
          
          int temp = a[first];
          a[first] = a[i];
          a[i] = temp ;
          temp = b[first] ;
          b[first] = b[i] ;
          b[i] = temp ;
          i = i - 1 ;
	}
	i = 0 ;
	int max = n + n ;
	while(i - n - n)
	{
		if(!(a[i] - a[n]) && (cal(5 , max , b[i]) - b[i]))
		{
			max = b[i] ;
			
		}
		i = i + 1 ;
	}
	
	printf("%d\n" , max);
   }
   return 0 ;
}