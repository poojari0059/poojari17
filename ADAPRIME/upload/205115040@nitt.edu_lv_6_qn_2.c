#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int hash[50]={0,0,1,0,2,3,4,0,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46};

int main()
{
    int t,n,i,res,tmp;
    scanf("%d",&t);
    while(t--)
    {
        scanf("%d",&n);
        res=0;
        for(i=0;i<n;i++)
        {
            scanf("%d",&tmp);
            res^=hash[tmp-1];
        }
        printf("%s\n",res?"CAPTAIN AMERICA":"IRONMAN");
    }
    return 0;
}
