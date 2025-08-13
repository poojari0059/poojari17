#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,temp,h;
	scanf("%d",&t);
	int n[t],hd[t],l[t];
	temp=t;
	while(t>0)
	{
		scanf("%d %d",&hd[t-1],&l[t-1]);
		
	t--;
		}
	t=temp;
	while(t>0)
{
	h=(4*hd[t-1]-l[t-1]);
	if(h>=0&&(h)%2==0)
		printf("%ld\n",(h/2));
	else
		printf("-1\n");
	
	t--;
}	
return 0;
	
}