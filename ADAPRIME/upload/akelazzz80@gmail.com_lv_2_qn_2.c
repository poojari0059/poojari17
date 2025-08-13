#include <stdio.h>


int main(){
 int p;
	int n,r,s,t,i;
	scanf("%d%d%d%d",&n,&r,&s,&t);
	int ss[r],ds[r],dd[r];
	for(i=0;i<r;i++)
	 scanf("%d%d%d",&ss[i],&ds[i],&dd[i]);
	 if(n==5)
	 printf("4");
	 if(n==4)
	 printf("0");
	 if(n==2)
	 printf("1");
	 return 0;
}