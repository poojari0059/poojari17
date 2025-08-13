#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(void)
{
int a[100][100],s,d,c,i,j,n,r,total,min,count,f;
		scanf("%d%d",&n,&r);
		for(i=1;i<=n;i++)
		  for(j=1;j<=n;j++)
		     a[i][j]=-1;
		for(i=0;i<r;i++)
		{
			 scanf("%d%d",&s,&d);
			 scanf("%d",&c);
			 a[s][d]=c;
		}
               total=0;
	    for(i=1;i<=n;i++)
	    {
	    	f=0;
	    	 count=0;
	    	min=65535;
	    	 for(j=1;j<=n;j++)
	    	 {
	    	     
	    	 	if(a[i][j]!=-1)
	    	 	{
	    	             if(min>a[i][j])
                             min=a[i][j];
                             f=1;
                             
			     }
                 }
                       if(f==1)
                         total+=min;
                      
			
		}
		printf("%d",total);
		 return 0;
}

              