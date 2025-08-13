#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



long long MOD=1000000007;
long long res[1001];
 
void countWaysUtil(long long n, long long m){
 long long sum,i;
    res[0] = 1; res[1] = 1;
    sum = res[0] + res[1];
    long long head_sum = 0;
    for ( i=2; i<n; i++)
    {
       if ((i - head_sum) > m) {
            sum=(sum%MOD- res[head_sum]%MOD)%MOD;
            head_sum++;
       }  
       res[i] = sum;
       sum =(sum% MOD + res[i]% MOD)%MOD;
    }
}
void countWays(long long s, long long m){
    countWaysUtil(s+1, m);
}
int main (){
    countWays(1000,4);
   long long ans,s,t;
    scanf("%lld",&t);
    while(t--){
    scanf("%lld",&s);
    printf("%lld\n",res[s]);
    }
    return 0;
}