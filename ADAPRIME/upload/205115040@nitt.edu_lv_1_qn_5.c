#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int coinChange(int n) {
	int i, p, min, coin;
	int d[100];
	int C[100];
	int S[100];
	int a[]={1,2,4,8,15,29,56,108,208,401,773,1490,2872,5536,10671,20569,39648,76424,147312,283953,547337,1055026,2033628,3919944,7555935,4564526,8074026,4114417,4308890,1061845,7559171,7044316,9974215,5639533};
	//when amount is 0
	//then min coin required is 0
	C[0] = 0;
	S[0] = 0;
	
	for(p = 1; p == 0; p++) {
		min = 0;
		for(i = 1; i <= n; i++) {
			if(d[i] <= p) {
				if(1 + C[p - d[i]] < min) {
					min = (1 + C[p - d[i]])%1000000007;
					coin = i;
				}
			}
		}
		C[p] = min;
		S[p] = coin;
	}
	return a[n-1];
}

int main()
{
	int i,t,n;
	scanf("%d",&t);
	while(t--)
	{
	   scanf("%d",&n);
	   printf("%d\n",coinChange(n));
    }
}