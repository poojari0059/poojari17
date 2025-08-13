#include <stdio.h>

int main() {
	
	int t,b,i,j,c=0,f,u,v,w,p,q;
	char m[52],n[52],s[53];
	scanf("%d",&t);
	while(t--) {
		scanf("%d %s %s",&b,m,n);
		for (i=0;m[i]!='\0';i++);
		p=i;
		for (j=0;j<i-j-1;j++) m[j]=m[j]+m[i-j-1]-(m[i-j-1]=m[j]);
		
		for (i=0;n[i]!='\0';i++);
		q=i;
		for (j=0;j<i-j-1;j++) n[j]=n[j]+n[i-j-1]-(n[i-j-1]=n[j]);
		
		c=0;
		i=0;
		j=0;
		f=1;
		while(i<q&&i<p) {
			if (n[i]>='0'&&n[i]<='9') v=n[i]-48;
			else if (n[i]>='A') v=n[i]-'A'+10;
			else f=0;
			
			if (m[i]>='0'&&m[i]<='9') u=m[i]-48;
			else if (m[i]>='A') u=m[i]-'A'+10;
			else f=0;
			
			if (u>=b||v>=b) f=0;
			
			w=(u+v+c)%b;
			c=(u+v+c)/b;
			if (w<10) s[j]=w+48;
			else s[j]=w+'A'-10;
			j++;
			i++;
		}
		while(i<q) {
			
			if (n[i]>='0'&&n[i]<='9') v=n[i]-48;
			else if (n[i]>='A') v=n[i]-'A'+10;
			else f=0;
			if (v>=b) f=0;
			
			w=(v+c)%b;
			c=(v+c)/b;
			
			if (w<10) s[j]=w+48;
			else s[j]=w+'A'-10;
			j++;
			i++;
		}
		while(i<p) {
			
			if (m[i]>='0'&&m[i]<='9') u=m[i]-48;
			else if (m[i]>='A') u=m[i]-'A'+10;
			else f=0;
			if (u>=b) f=0;
			
			w=(u+c)%b;
			c=(u+c)/b;
			
			if (w<10) s[j]=w+48;
			else s[j]=w+'A'-10;
			j++;
			i++;
		}
		if(c!=0) {
			w=c%b;
			if (w<10) s[j]=w+48;
			else s[j]=w+'A'-10;
			c/=b;
			j++;
		}
		j--;
		for(;s[j]=='0'&&j>0;j--);
		if (f)
		for (;j>=0;j--) printf("%c",s[j]);
		else printf("NA");
		printf("\n");
	}
	
	return 0;
}