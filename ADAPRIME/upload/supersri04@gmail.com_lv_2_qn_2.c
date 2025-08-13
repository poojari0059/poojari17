#include <stdio.h>

int main() {
	int n,r,w[100][100],i,j,k,u,v,d[100],visited[100]={0},ans=0;
	float s,t;
	
	scanf("%d %d %f %f",&n,&r,&s,&t);
	for (i=0;i<=n;i++) for (j=0;j<=n;j++) if(i==j) w[i][j]=0; else w[i][j]=10000000;
	for (i=0;i<r;i++) {
		scanf("%d %d",&u,&v);
		scanf("%d",&w[u][v]);
		w[v][u]=w[u][v];
	}
	n++;
	d[0]=0;
	visited[0]=1;
	for (i=1;i<n;i++) d[i]=10000000;
	for (i=1;i<n;i++) {
		for (j=0;j<n;j++) if (!visited[j]) break;
		k=j;
		for (;j<n;j++) if (!visited[j]&&w[0][k]>w[0][j]) k=j;
		for (j=0;j<n;j++) if (d[j]+w[j][k]<d[k]) d[k]=d[j]+w[j][k];
		visited[k]=1;
	}
	for (i=1;i<n;i++) {
		if (2*d[i]<=s*t) ans++;
	}
	printf("%d\n",ans);
	return 0;
}