#include <stdio.h>

int main() {
	int q,t,a,b,c,d,e ;
	scanf("%d",&q) ;
	while(q) {
		q=q-1 ;
		scanf("%d %d %d",&t,&a , &b) ;
		if (!(t- 1)) printf("%d\n",a+b) ;
		if (!(t- 2)) printf("%d\n",a-b) ;
		
		if (!(t- 3)) {
			c = 0 ;

			if (b>> 31) {
				b= -b;
				a= -a;
			}
			
			while(b) {
				if (b & 01) {
					c=c+a ;
				}
				a=a<< 1 ;
				b=b>> 1 ;
			} 
			printf("%d\n",c) ;
		}
		if (!(t- 4)) printf("%d\n",a/b) ;
		if (!(t- 5)) {
			c=a-b ;
			if (!c) printf("0\n") ;
			if (c	&& !(c>> 31)) printf("%d\n",a) ;
			if (c && (c>> 31)) printf("%d\n",b) ;
		}
		if (!(t- 6)) {
			c=b-a ;
			if (!c) printf("0\n") ;
			if (c	&& !(c>> 31)) printf("%d\n",a) ;
			if (c && (c>> 31)) printf("%d\n",b) ;
		}
		if (!(t-7)) {
			d=a/b ;
			c= 0 ;
			e=a ;
			
			if (b>> 31) {
				b= -b;
				d= -d;
			}

			while(b) {
				if (b & 01) {
					c=c+d ;
				}
				d=d<< 1 ;
				b=b>> 1 ;
			}
			
			printf("%d\n",e-c) ;
		}
		
	}
	return 0 ;
}