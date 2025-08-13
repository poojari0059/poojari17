#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
int t;
float a, i, m;
scanf("%d",&t);
while(t--){
scanf("%f %f",&a, &i);
m = 2*a - 2*i +2;
printf("%f\n",m);
}
return 0;
}