#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int n,t,i;
	double a[100],o,s,T;
	double o1;
	scanf("%d",&t);
	double PI=3.14159265;
	while(t--)
	{
		double val = PI / 180.0;
		double inv= 90/180.0;
		scanf("%d",&n);
		scanf("%lf%lf%lf",&o,&T,&s);
		o1=o*val;
	
		for(i=0;i<n-1;i++)
		  scanf("%lf",&a[i]);
		  int mini=0;
		  float min;
		for(i=0;i<n-1;i++)
		{
			float t;
			t=((float)a[i]/(s*sin(o1)));
		  
		    if(i==0)
		     min=t;
		  //  printf("%f\n",t);
		    if(t<=T)
		    {
		    	if(min>=t)
		    	{
				  min=t;
				  mini=i+1;
			    }
			}
			
		}  
		printf("%d\n",mini);
	}
	return 0;
}