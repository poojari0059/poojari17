#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{int t;
scanf("%d",&t);
while(t--){
    float a;
    int i,b;
    scanf("%f %d",&a,&i);
    b=2*(a+1-i);
    printf("%d\n",b);
}
    return 0;
}