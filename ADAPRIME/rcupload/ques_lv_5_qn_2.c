
#include <stdio.h>
#include <math.h>
float distance(float A[], float B[]){
	float result=0;
	result = sqrt(pow(A[0] - B[0], 2) + pow(A[1] - B[1], 2));
	return result;
}

void incenter(float A[], float B[], float C[]){
	float result[2];

	float a = distance(B, C);
	float b = distance(C, A);
	float c = distance(A, B);
	
 if(((a+b)<=c)||((a+c)<=b)||((c+b)<=a)){
 	printf("NA\n");
 	return;
 }

	float perimeter = a + b + c;

	result[0]= (a*A[0] + b*B[0] + c*C[0]) / perimeter;
	result[1] = (a*A[1] + b*B[1] + c*C[1]) / perimeter;
	int x=floor(result[0]),y=floor(result[1]);
    printf("%d %d\n",x,y);
  return;
}

int main(){
	 
	 int test_case;
	 scanf("%d",&test_case);
	 while(test_case--){
	 	
	 	float A[2], B[2], C[2];
	 	scanf("%f%f%f%f%f%f",&A[0],&A[1],&B[0],&B[1],&C[0],&C[1]);
	 	
		  incenter(A, B, C);
	
	 }
	return 0;
}

