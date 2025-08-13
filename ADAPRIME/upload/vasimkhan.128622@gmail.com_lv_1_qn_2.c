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
        float a,i,ans;
        int j;
        scanf("%f%f",&a,&i);
        ans=a-i+1;
        ans=2*ans;
        j=ans;
        printf("%d\n",j);
         
    }
    
   
    return 0;
}
