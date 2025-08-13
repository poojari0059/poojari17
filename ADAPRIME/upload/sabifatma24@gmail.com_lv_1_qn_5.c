#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void fun(int l, int n, int *ct) {
	int i;
	if(l>n)
		return;
	if(l==n) {
		(*ct)++;
		return;
	}
	for(i=1;i<5;i++)
		fun(l+i, n, ct);
}
int main() {
	int t, n, res;
	scanf("%d",&t);
	while(t--) {
		scanf("%d",&n);
		res = 0;
		fun(0, n, &res);
		printf("%d\n",res);
	}
	return 0;
}