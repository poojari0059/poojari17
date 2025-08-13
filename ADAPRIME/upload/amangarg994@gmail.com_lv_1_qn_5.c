#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main(){
	int t,n,i,j;
	scanf("%d",&t);
	while(t--){
		scanf("%d",&n);
		long long int arr[n];
		if(n==1)
		  printf("1\n");
		else if(n==2)
		  printf("2\n");
		else if(n==3)
		  printf("4\n");
		else if(n==4)
		  printf("8\n");
		else{
			 arr[0]=1;
			 arr[1]=2;
			 arr[2]=4;
			 arr[3]=8;
			 for(i=4;i<n;i++)
			   arr[i]=arr[i-1]+arr[i-2]+arr[i-3]+arr[i-4];
			
			printf("%lld\n",arr[n-1]%1000000007);
		}
		  
	}
}