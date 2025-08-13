#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
    int n,r,s,d,i,sum=0,temp,j;
    scanf("%d%d",&n,&r);
    int c[r];
    for(i=0;i<=4;i++)
        scanf("%d%d%d",&s,&d,&c[i]);
    for(i=0;i<r-1;i++)
    {
        for(j=0;j<r-i-1;j++)
        {
            if(c[j]>c[j+1])
            {
                temp=c[j];
                c[j]=c[j+1];
                c[j+1]=temp;
            }
        }
    }
    for(i=0;i<=n-2;i++)
        sum+=c[i];
    printf("\n%d",sum);return 0;
}
