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
int in1[1001] , in2[1001] , n , i , j ;
int main(){
	int q ;
	scanf ("%d", & q) ;
	while(q)
	{
		scanf ("%d", & n) ;
		i = 0 ;
		int  t = multiply(n , 2) ;
		while ((t - i))
		{
			scanf ("%d", & in1[i]) ;
			in1[i] = multiply(in1[i] , (i + 1) ) ;
			in2[i] = in1[i] ;
			i = i + 1 ;
		}
		i = 0 ;
		while (t - 1 - i)
		{
			j = 0 ;
			while (t - i - 1 - j)
			{
				int tmp = in1[j] - in1[j + 1] ;
				if ( ! ((tmp >> 31) & 0x1))
				{
					int temp = in1[j] ;
					in1[j] = in1[j + 1] ;
					in1[j + 1] = temp ;
				}
				j = j + 1 ;
			}
			i = i + 1 ;
		}
		i = 0 ;
		int f = 1 ;
		while ((t - i) && f)
		{
			if (! (in2[i] - in1[n]))
			f = 0 ;
			i = i + 1 ;
		}

		printf ("%d\n" , i) ;
		q = q - 1 ;
	}
	return 0 ;
}