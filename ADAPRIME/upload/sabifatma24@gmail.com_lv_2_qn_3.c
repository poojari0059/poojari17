#include <stdio.h>

int n;
char a[55], b[55], c[60];
int l(char *s) {
	int i;
	for(i=0;s[i]!='\0';i++);
	return i;
}
int v(char c)
{
    if (c >= '0' && c <= '9')
        return (int)c - '0';
    else
        return (int)c - 'A' + 10;
}
char rV(int n)
{
    if (n >= 0 && n <= 9)
        return (char)(n + '0');
    else
        return (char)(n - 10 + 'A');
}
void rev(char *s)
{
    int m = l(s);
    int i;
    for (i = 0; i < m/2; i++)
    {
        char t = s[i];
        s[i] = s[m-i-1];
        s[m-i-1] = t;
    }
}
int z() {
	int i, n1, n2, ts, w=0;
	rev(a);
	rev(b);
	n1 = l(a);
	n2 = l(b);
	for(i=0;i<n1 && i<n2; i++) {
		if(v(a[i]) >= n || v(b[i]) >= n)
			return 0;
		ts = v(a[i]) + v(b[i]) + w;
		if(ts >= n) {
			ts = ts-n;
			w = 1;
		}
		else 
			w = 0;
		c[i] = rV(ts);
	}
	while(i<n1) {
		if(v(a[i]) >= n)
			return 0;
		ts = v(a[i]) + w;
		if(ts >= n) {
			ts = ts-n;
			w = 1;
		}
		else 
			w = 0;
		c[i] = rV(ts);
		i++;
	}
	while(i<n2) {
		if(v(b[i]) >= n)
			return 0;
		ts = v(b[i]) + w;
		if(ts >= n) {
			ts = ts-n;
			w = 1;
		}
		else 
			w = 0;
		c[i] = rV(ts);
		i++;
	}
	if(w){
		c[i] = rV(w);
		i++;
	}
	c[i] = '\0';
	rev(c);
	return 1;
}
int main() {
	int t, p, i, f;
	scanf("%d",&t);
	while(t--) {
		scanf("%d %s %s",&n, a, b);
		if(z()) {
			p = l(c);
			i=0;
			while(c[i]=='0')
				i++;
			f=1;
			for(;i<p;i++) {
				printf("%c",c[i]);
				f=0;
			}
			if(f)
				printf("0");
			printf("\n");
		}
		else	
			printf("NA\n");
	}
	return 0;
}