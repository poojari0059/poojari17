#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int t,n,ans=0,a[100],s,i;
	scanf("%d",&t);
	while(t--) {
		scanf("%d",&n);
		ans=0;
		for (i=0;i<n;i++) scanf("%d",a+i);
		t=0;
		for (i=0;i<n;i++) if (a[t]<=a[i]) t=i;
		s=n-1;
		for (i=t;i>=0;i--,s--) ans+=s*a[i];
		for (i=n-1;i>t;i--,s--) ans+=s*a[i];
		printf("%d\n",ans);
	}
	return 0;
}