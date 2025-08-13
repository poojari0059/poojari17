#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int check(int a){
    
		int r;
        while(a>0)
		{
			int r=a%10;
			if(r==3)
			{
			   return 0;	
			}
			a=a/10;
		}
    return 1;
     
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
        int m,n,i;
		scanf("%d%d",&m,&n);
		int ans=0;
		m++;
		while(m<n){
			ans+=check(m);
			m++;
		}
		printf("%d\n",ans);
	}
	return 0;
}
