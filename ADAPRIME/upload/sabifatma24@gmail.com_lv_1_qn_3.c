#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int checkV(char ch) {
	if(ch == 'a' || ch == 'A' || ch == 'e'  || ch == 'E'  || ch == 'i'  || ch == 'I'  || ch == 'o'  || ch == 'O'  || ch == 'u'  || ch == 'U')
		return 1;
	return 0;
}
int main() {
	int t, v, sum, n, i, tnum;
	char str[1000008];
	scanf("%d", &t);
	while(t--) {
		scanf("%s",str);
		n=strlen(str);
		v=0;
		sum=0;
		for(i=0;i<n;i++) {
			if(i != 0 && i!= n-1 && checkV(str[i])) {
				if(checkV(str[i-1]) && checkV(str[i+1])) {
					if((str[i]<91 && str[i]>64) && (str[i-1]<91 && str[i-1]>64) && (str[i+1]<91 && str[i+1]>64))
						v++;
					if((str[i]<123 && str[i]>96) && (str[i-1]<123 && str[i-1]>96) && (str[i+1]<123 && str[i+1]>96))
						v++;
				}
			}
			if(str[i] > 47 && str[i] < 58) {
				tnum=str[i]-48;
				while(i+1 < n && str[i+1] > 47 && str[i+1] < 58) {
					tnum *= 10;
					tnum += str[i+1]-48;
					i++;
				}
				sum += tnum;
			}
		}
		printf("%d\n",v%sum);
	}
	return 0;
}