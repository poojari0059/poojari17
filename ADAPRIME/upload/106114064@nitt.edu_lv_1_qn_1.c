#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
int t;
scanf("%d",&t);
while(t--)
{
unsigned long long h,l,ans,cows;
    scanf("%llu%llu",&h,&l);
    
    if(l%2==0){
        cows=(l-2*h)/2;
        if(cows>=0&&cows<=h){ans=h-cows;
        printf("%llu\n",ans);
}
else
  printf("-1\n");
    }
else
{
   
    printf("-1\n");
}
}
}
