#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
int t;
float a,b,i;
scanf("%d",&t);
while(t--){
scanf("%f %f", &a,&i);
b = 2 * (a-i+1);
printf("%f\n",b);
}
return 0;
}