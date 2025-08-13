#include <stdio.h>

int sign(int n){
	  if(!n)
	   return 0;
		if((n_RIGHTSHIFT_31)&1)
		 return 1;
		 return 0;
}

int Mul(int x, int y){
	int flag1=0,flag2=0;
  if((!x)||(!y))
    return 0;
    if(sign(x)){
	    x=-x;
    	flag1=1;
    }
	if(sign(y)){
	 y=-y;
	  flag2=1;
   }
   int sum=0;
   while(y){
   	sum+=x;
   	  y-=1;
   }
   
   if(flag1)
    sum=-sum;
    if(flag2)
     sum=-sum;
    return sum;
	
}
int mod(int a,int b){
	    if(!(a/b))
	     return a;
	     int flag1=0,flag2=0;
    if(sign(a)){
	    a=-a;
    	flag1=1;
    }
	if(sign(b)){
	 b=-b;
	  flag2=1;
   }
   while(a/b){
   	a-=b;
   }
   if(flag1)
    return -a;
    return a;
	
}

int Div(int a,int b){
	
	return a/b;
}
int max(int a,int b){
   if(!(a^b))
    return 0;
  if(a/b)
   return a;
   return b;
	
}
int min(int a,int b){
   if(!(a^b))
    return 0;
  if(a/b)
   return b;
   return a;	
	
}
int main(){
	int operation;
	scanf("%d",&operation);
	while(operation){
		int query;
		scanf("%d",&query);
		int a,b;
		scanf("%d%d",&a,&b);
		  if(!(query^1)){
		    printf("%d\n",a+b);
		  }
		  if(!(query^2))
		  printf("%d\n",a-b);
		  
		   if(!(query^3))
		   printf("%d\n",Mul(a,b));
		   
		   if(!(query^4)){
		   	 printf("%d\n",Div(a,b));
		   }
		
		if(!(query^5))
		printf("%d\n",max(a,b));
		if(!(query^6))
		printf("%d\n",min(a,b));
		if(!(query^6))
		 printf("%d\n",mod(a,b));
		operation-=1;
	}
	return 0;
}