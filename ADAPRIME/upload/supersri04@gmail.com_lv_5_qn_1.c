#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int u,n,a[100000],b[100000],i,j,k;
	long long int s=0,t;
	scanf("%d",&u);
	while(u--) {
		scanf("%d",&n);
		j=0;k=0;
		for (i=0;i<n;i++) {
			if (i&1) {scanf("%d",b+j);j++;}
			else {scanf("%d",a+k);k++;}
		}
		n=n/2;
		t=0;
		s=0;
		for (i=0;i<n;i++) t+=a[i];
		if (t>s) s=t;
		for (;i<k;i++) {
			t=t+a[i]-a[n-i];
			if (t>s) s=t;
		}
		t=0;
		for (i=0;i<n;i++) t+=b[i];
		if (t>s) s=t;
		for (;i<j;i++) {
			t=t+b[i]-b[n-i];
			if (t>s) s=t;
		}
		if (n==0) s=a[0];
		
		printf("%lld \n",s);
	}
	return 0;
}