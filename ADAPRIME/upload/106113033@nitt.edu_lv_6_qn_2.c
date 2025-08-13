#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int n,vis[100],sg[100],i,j,a[100];
void get()
{
    memset(sg,0,sizeof(sg));
    int i,j,x;
    for(i=1; i<=100; i++) 
    {
        memset(vis,0,sizeof(vis));
        for(j=1; j+j<=i; j++)
            vis[sg[j]^sg[i-j]]=1;
        for(x=0; x<=100; x++)
            if(!vis[x])
                {
                    sg[i]=x;
                    break; 
                }
    }
}


int main() {

	get();
	int t;
	scanf("%d",&t);
	while(t--)
	{
	scanf("%d",&n);
	for(i=0;i<n;i++)
	scanf("%d",&a[i]);
	int s=0;
	for(i=0;i<n;i++) {
		s^=sg[a[i]];
	}
	if(s==0) printf("IRONMAN\n");
	else printf("CAPTAIN AMERICA\n");
   }
	
 
	return 0;
}