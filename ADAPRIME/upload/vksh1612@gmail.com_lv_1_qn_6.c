#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

// Author : Vikash
int minKey(int value[], int picked[],int cities)
{
   int min=99999999,index=0,i;
   for (i = 1;  i<= cities; i++)
     if (picked[i] == 0 && value[i] < min)
         min = value[i], index = i;
   return index;
}


long long getMinimumCost(int mat[101][101],int cities){
	int picked[101]={0};
	int value[101],i,j;
	long long cost = 0;
	for(i = 1;i<=cities;i++){
		value[i] = 999999999;
	}
	value[1] = 0;
    for (j = 1; j < cities; j++){
    	int i,index = minKey(value,picked,cities);
        picked[index] = 1;
        for (i = 1; i <= cities; i++)
          if (mat[index][i] && picked[i] == 0 && mat[index][i] <  value[i])
            value[i] = mat[index][i];
     }
     for(i=1;i<=cities;i++)
     	cost += value[i];
    return cost;
}

int main(){
	int cities,roads,i;
	int mat[101][101]={0};
	scanf("%d %d",&cities,&roads);
	for(i=0;i<roads;i++){
		int src,dst,c;
		scanf("%d %d %d",&src,&dst,&c);
		mat[src][dst] = c;
		mat[dst][src] = c;
	}
	printf("%lld\n",getMinimumCost(mat,cities));
	return 0;
}