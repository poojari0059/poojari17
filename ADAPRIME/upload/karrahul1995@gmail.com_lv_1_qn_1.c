#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main() {
  long long  int ans=-1,cows;    
   long long int h,l,t;
    
    scanf("%lld",&t);
    while(t--){
    scanf("%lld%lld",&h,&l);

        ans=-1;
        if(l%2==0){
        cows=(l-2*h)/2;
    if(cows>=0 && cows<= h)ans=( h-cows);
        
        }
        printf("%lld\n",ans);}
    return 0;
}
