#include <stdio.h>

int m[105][105], v[105], n, x;
void D(int i, int s) {
	int j;
	v[i]=1;
	for(j=0;j<n;j++)
		if(!v[j]  && m[i][j] != 0) {
			s = s - m[i][j];
			if(s>=0) {
				x++;
				D(j, s);
			}
			s = s + m[i][j];
		}
}
int main() {
	int r, s, t, i, a,b;
	scanf("%d %d %d %d",&n, &r, &s, &t);
	s *= t/2;
	for(i=0;i<r;i++) {
		scanf("%d %d %d", &a, &b, &t);
		m[a][b]=m[b][a]=t;
	}
	D(0, s);
	printf("%d",x);
 	return 0;
}