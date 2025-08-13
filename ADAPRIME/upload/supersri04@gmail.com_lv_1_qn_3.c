#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int t,u=0;
	long long int s=0,n=0,v=0;
	char c,d,e;
	scanf("%d ",&t);
	while(t--) {
		c=getchar();
		u++;
		e=c;
		if (c<='9'&&c>='0') n+=c-48;
		while(c!='\n') {
	    if (u>2) {e=d;d=c;}
		if (u==2) {d=c;}
		c=getchar();
		u++;
		if (u>2) {
			if (d=='a'||d=='e'||d=='i'||d=='o'||d=='u') {
				
			    if (e=='a'||e=='e'||e=='i'||e=='o'||e=='u') {
			    	
					if (c=='a'||c=='e'||c=='i'||c=='o'||c=='u') {
					v++;}
				}
			} 
			if (d=='A'||d=='E'||d=='I'||d=='O'||d=='U') {
				
			    if (e=='A'||e=='E'||e=='I'||e=='O'||e=='U') {
			    	
					if (c=='A'||c=='E'||c=='I'||c=='O'||c=='U') v++;
				}
			}
		}
		if (c<='9'&&c>='0') {
			n*=10;
			n+=c-48;
		}
		else {
			s+=n;
			n=0;
		}
		}
		s+=n;
		printf("%lld\n",v%s);
		u=0;v=0;n=0;s=0;
	}
	
	return 0;
}