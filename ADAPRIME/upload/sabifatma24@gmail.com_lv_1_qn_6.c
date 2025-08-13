#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int minKey(int key[], int mst[], int n){
   	int min = 99999, min_index, i;
   	for (i = 0; i < n; i++){
		if (mst[i] == 0 && key[i] < min) {
    		min = key[i];
			min_index = i;
     	}
    }
   return min_index;
}
int main() {
	int n, r, arr[102][105], i, j, a, b, t, par[105], key[105], mst[105], u, sum=0;
	scanf("%d %d",&n,&r);
	for(i=0;i<n;i++) {
		key[i] = 99999;
		mst[i] = 0;
		for(j=0;j<n;j++) 
			arr[i][j]=0;
	}
	for(i=0;i<r;i++) {
		scanf("%d %d %d",&a,&b,&t);
		a--;
		b--;
		arr[a][b]=t;
		arr[b][a]=t;
	}
	key[0] = 0;
	par[0] = -1;
	for(i=0;i<n-1;i++) {
		u = minKey(key, mst, n);
		mst[u] = 1;
		for(j=0;j<n;j++) {
			if(arr[u][j] && mst[j] == 0 && arr[u][j] < key[j]){
				par[j] = u;
				key[j] = arr[u][j];
			}
		}
	}
	for(i=1;i<n;i++)
		sum+=arr[i][par[i]];
	printf("%d",sum);
	return 0;
}