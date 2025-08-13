#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
	int adj[100][100],i,j,k,n,r,u,v,ans=0;
	int visited[100]={0};
	scanf("%d %d",&n,&r);
	for (i=0;i<n;i++) for (j=0;j<n;j++) adj[i][j]=100001;
	for (i=0;i<r;i++) {
		scanf("%d %d",&u,&v);
		u--;
		v--;
		scanf("%d",&adj[v][u]);
		adj[u][v]=adj[v][u];
	}
	visited[0]=1;
	for (i=1;i<n;i++) {
		u=-1;
		v=-1;
		for (j=0;j<n;j++) {
			if (!visited[j]) continue;
			for (k=0;k<n;k++) {
				if (visited[k]) continue;
				if (u==-1) {u=k;v=j;}
				else if (adj[j][k]<adj[v][u]) {v=j;u=k;}
			}
		}
		visited[u]=1;
		ans+=adj[v][u];
	}
	printf("%d\n",ans);
	return 0;
}