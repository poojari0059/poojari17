#include <stdio.h>

int a,b;
int maxi(){
	int c;
	c=a-b;
	if(c>>15 & 1)
		return b;
	return a;
}
int mini(){
	int c;
	c=a-b;
	if(c>>15 & 1)
		return a;
	return b;
}
int mul(){
	int i,x;
	i=0;
	x=0;
	while(i!=b){
		x=x+a;
		i=i+1;
	}
	return x;
}
int mod(){
	int x,y;
	if(!(b!=0))
		return 0;
	if(b>>15 & 1)
		b=-b;
	x=a/b;
	y=a;
	a=x;
	x=y- mul();
	return x;
}
int main(){
	int q,t;
	scanf("%d",&q);
	while(q!=0){
		scanf("%d%d%d",&t,&a,&b);
		if(!(t!=1))
			printf("%d\n" ,a+b);
		if(!(t!=2))
			printf("%d\n" ,a-b);
		if(!(t!=3))
			printf("%d\n" , mul());
		if(!(t!=4))
			printf("%d\n" ,a/b);
		if(!(t!=5))
			printf("%d\n" , maxi());
		if(!(t!=6))
			printf("%d\n" , mini());
		if(!(t!=7))
			printf("%d\n" , mod());
		q=q-1;
	}
	return 0;
}