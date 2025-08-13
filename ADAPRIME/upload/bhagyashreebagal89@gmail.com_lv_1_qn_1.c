#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
long int t;
scanf("%d",&t);
while(t--){
long long int h,l,hen,cow;
scanf("%d %d",&h,&l);
cow=(l-(2*h))/2;
hen=h-cow;
printf("%d",hen);
printf("\n");


}


}