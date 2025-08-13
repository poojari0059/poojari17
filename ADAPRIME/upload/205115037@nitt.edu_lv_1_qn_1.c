#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

/*//xxxx<stdio.h>
 long long int sol(unsigned long  long int h, unsigned long long int l)
{
unsigned long	 long int c,i=0;
	while(i<h+1)
	{
		c=h-i;
		//t=4*c+2*i;
		if(l==(4*c+2*i))
		return i;
		else
		++i;
	}
	return -1;
}*/
int main()
{
	 int t;
	scanf("%d",&t);
	while(t--)
	{
	   unsigned long long int h,l,result1;
             long long int result;
		scanf("%llu%llu",&h,&l);
               result1=(h*4-l);
			   result=(h*4-l);
               if(l/4>h || l<2*h)
               {
               	printf("-1\n");
			   }
			   else
                if(l==0&&h==0)
           {
               printf("0\n");
          //   continue;
           }
                else
      
                                if(l<=0 || h<=0|| l%2!=0 || result<0 || (result%2)!=0)
                printf("-1\n");
                else
		         printf("%llu\n",result1/2);
	

        }
     return 0;
}