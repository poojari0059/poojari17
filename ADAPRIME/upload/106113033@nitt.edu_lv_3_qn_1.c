#include <stdio.h>

int multiply(int x , int y)
{
   if ( ! y)
     return 0 ;
   if ((y >> 31) & 0x1)
     return -(multiply(x , -(y))) ;
     return (x + multiply(x , y - 1)) ;
  
}
int main(){
	int q ;
	scanf ("%d", & q) ;
	while(q)
	{
		int a , b , c , res ;
		res = 0 ;
		scanf ("%d %d %d", & c , & a , & b) ;
		if ( ! (c - 1))
		{
		res = a + b ;
	    }
		if ( ! (c - 2))
		{
		res = a - b ;
	    }
		if ( ! (c - 3))
		{
            res = multiply(a , b) ;
     
        }
		
	    
		if ( ! (c - 5))
		{
         
        int temp = a - b ;
		if ((temp >> 31) & 0x1)
	    res = b ;
		if ( !((temp >> 31) & 0x1))
		res = a ;
		if ( ! (a - b))
		res = 0 ;

		}
	if ( ! (c - 4))
		{
		
		res = a / b ;
	    }
		if ( ! (c - 6))
		{
		int temp = a - b ;
		if ((temp >> 31) & 0x1)
	    res = a ;
		if ( !((temp >> 31) & 0x1))
		res = b ;
		if ( ! (a - b))
		res = 0 ;
		}
		if ( ! (c - 7))
		res = a - multiply(b , a / b) ;
		
		printf ("%d\n" , res) ;
		q = q - 1 ;
	}
		return 0 ;
}