#include <stdio.h>


int main(){
  int test_case;
  scanf("%d",&test_case);
  while(test_case--){
  	float pb,py,pc;
  	scanf("%f%f%f",&pb,&py,&pc);
 	float pbb=(pb*pc*pc)+(pb*(1-pc)*(1-pc))+(py*pc*(1-pc))*2.0;
 	float pob=(pc*pc)+(1-pc)*(1-pc);
 	float pbbb=pb*pob;
 	float res=pbbb/pbb;
 	printf("%.2f\n",res);
 	
  }
  return 0;
}