#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int t;
	long long int L,H;
	scanf("%d",&t);
	while(t--) {
		scanf("%lld %lld",&H,&L);
		if (L%2!=0) printf("-1\n");
		else if (L>4*H||L<2*H) printf("-1\n");
		else printf("%lld\n",2*H-L/2);
	}
	return 0;
}