#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int t,n,ans=0,s;
	scanf("%d",&t);
	while(t--) {
		scanf("%d",&n);
		ans=0;
		while(n--) {
			scanf("%d",&s);
			while(s) {
				if (s&1) ans++;
				s/=2;
			}
		}
		printf("%d\n",ans);
	}
	return 0;
}