#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


long long max1(long long x,long long y){
	return (x>y)?x:y;
}

int max(int A[],int n) {
	int i;
		if (n == 0) return 0;

		long long allsum = 0;
		long long sum2 = 0;
		for (i = 0; i < n; i++) {
			allsum += A[i] * i;
			sum2 += A[i];
		}

		long long result = allsum;
		for (i = 0; i <n; i++) {
			allsum -= sum2;
			allsum += A[i];
			allsum += A[i] * (int)(n - 1);
			result = max1(allsum, result);
		}

		return result;
	}
	
int main(){
	int testcase,i;
	scanf("%d",&testcase);
	while(testcase--){
		int n;
		scanf("%d",&n);
		int arr[n];
		for(i=0;i<n;i++)
		 scanf("%d",&arr[i]);
		 printf("%d\n",max(arr,n));
	}
	return 0;
}