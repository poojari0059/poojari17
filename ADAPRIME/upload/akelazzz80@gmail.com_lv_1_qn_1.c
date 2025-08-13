#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



long long countHens(long long  heads, long long  feet){
	
	if(2*heads>feet)
		return -1;
    if((4*heads-feet)<0)
    	return -1;
    	
	if((4*heads-feet)%2)
	    return -1;
	    
	return (4*heads-feet)/2;
}


int main(){
	int test_case;
	scanf("%d",&test_case);
	while(test_case--){
		long long heads,legs;
		scanf("%lld%lld",&heads,&legs);
		printf("%lld\n",countHens(heads,legs));
	}
	while(1){
		
	}
	return 0;
}
