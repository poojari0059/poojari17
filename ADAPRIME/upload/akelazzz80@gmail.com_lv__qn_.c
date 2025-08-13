#include <stdio.h>


   long long Rob(int nums[],int n) {
        long long incl1,excl1,i;
        if(!n)
        return 0;
        if(n==1)
        return nums[0];
        incl1=nums[0];
        excl1=0;
        long long incl2=nums[1];
        long long excl2=0;
        for(i=1;i<n-1;i++){
            int k1=excl1+nums[i];
            int temp1=incl1;
            if(k1>incl1)
            incl1=k1;
            excl1=temp1;
            int k2=excl2+nums[i+1];
            int temp2=incl2;
            if(k2>incl2)
            incl2=k2;
            excl2=temp2;

        }
        return (incl1>incl2?incl1:incl2);
    }

int main(){
	int test_case;
	scanf("%d",&test_case);
	while(test_case--){
		int n,i;
		scanf("%d",&n);
		int arr[n];
		for(i=0;i<n;i++)
		  scanf("%d",&arr[i]);
	      printf("%lld\n",Rob(arr,n));
	}
	return 0;
}