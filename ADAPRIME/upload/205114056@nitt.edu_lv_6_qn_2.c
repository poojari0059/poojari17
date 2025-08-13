#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
    int t,i,n=1,g[51]={0},x,tmp;

    for(i=3;i<=8;i++)
    {
        if(i&(i-1))
        {
            g[i]=n;
            n++;
        }
    }

    for(i=9;i<51;i++)
    {
        g[i]=n;
        n++;
    }

    scanf("%d",&t);

    while(t--)
    {
        x=0;
        scanf("%d",&n);

        for(i=0;i<n;i++)
        {
            scanf("%d",&tmp);
            x^=g[tmp];
        }

        if(x) printf("CAPTAIN AMERICA\n");
        else 	printf("IRONMAN\n");

      
    }

    return 0;
}