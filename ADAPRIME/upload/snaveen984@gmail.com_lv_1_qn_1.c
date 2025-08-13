#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
int t;
scanf("%d",&t);
while(t--){
int a;
int h,l;
scanf("%d%d",&h,&l);
if((l-2*h)%2 != 0)
return -1;
if((4*h-l)%2 != 0)
return -1;
a = (4*h-l)/2;
printf("%d\n",a);
}
return 0;
}