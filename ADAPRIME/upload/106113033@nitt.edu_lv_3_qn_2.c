#include <stdio.h>

int multiply(int a , int b)
{
int m = 0 ;
          while (a)
          {
                if(a & 1)
                   m = m + b ;
                a = a >>  1 ;
                b = b << 1 ;
          }
return m ;
}
int mod(int a , int b)
{
	return a - multiply(b , a / b) ;
}


int main(){
	int q ;
	scanf ("%d", & q) ;
	while(q)
	{
		int a , b , c , res , ans , flag = 1 ;
		res = 0 ;
		scanf ("%d %d %d", & c , & a , & b) ;
		res = b / a ;
		if (mod(b , a))
		{
		res = res + 1 ;
	    }
		int cur = 1 ;
		while (flag)
		{
			
			if ( ! (b / multiply(cur , c)))
			{
				ans = b / cur ;
				if (mod(b , cur))
		       {
		        ans = ans + 1 ;
	            }
				flag = 0 ;
			}
			
			b = b - multiply(cur , c) ;
			if ( ! b)
			{
				ans = c ;
				flag = 0 ;
			}
			cur = cur + 1 ;
		}
		printf ("%d %d\n" , ans , res) ;
		q = q - 1 ;
	}
	return 0 ;
}