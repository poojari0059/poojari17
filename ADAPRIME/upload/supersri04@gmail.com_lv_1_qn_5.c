#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int ans[101],i,n,t;
	ans[1]=1;
	ans[2]=2;
	ans[3]=4;
	ans[4]=8;
	for (i=5;i<=100;i++) {
		ans[i]=ans[i-4]+ans[i-3];
		ans[i]%=1000000007;
		ans[i]+=ans[i-2]+ans[i-1];
		ans[i]%=1000000007;
	}
	scanf("%d",&t);
	while(t--) {
		scanf("%d",&n);
		printf("%d\n",ans[n]);
	}
	return 0;
}