#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int compare(const void * a, const void * b){
   return ( *(int*)b - *(int*)a );
}
long long minimunmCost(int x[],int y[],int m,int n){
	long long cost = 0;
	int i=0,j=0,cutX=1,cutY=1,val=0;
	qsort(x,m,sizeof(int),compare);
	qsort(y,n,sizeof(int),compare);
			
	while(i<m && j<n){
		if(x[i]>y[j]){
			cost += x[i] * cutX;
			i++;
			cutY++;
		}
		else{
			cost += y[j] * cutY;
			j++;
			cutX++;
		}
	}
	val = 0;
	while(i<m){
		val += x[i++];
	}
	cost += val * cutX;
	val = 0;
	while(j<n){
		val += y[j++];
	}
	cost += val * cutY;
	return cost;
}
int main(){
	int t;	
	scanf("%d",&t);
	while(t--){
		int i,m,n;
		int x[101],y[101];
		scanf("%d %d",&m,&n);
		for(i=0;i<m-1;i++){
			scanf("%d",&x[i]);
		}
		for(i=0;i<n-1;i++){
			scanf("%d",&y[i]);
		}
		printf("%lld\n",minimunmCost(x,y,m-1,n-1));
	}
	return 0;
}