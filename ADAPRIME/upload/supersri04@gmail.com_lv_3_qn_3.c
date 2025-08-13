#include <stdio.h>

int main() {
	int t,n,p[1000],q[1000],i,j,c,a,b ;
	scanf("%d",&t) ;
	while (t) {
		t=t	-1 ;
		scanf("%d",&n) ;
		
		n=n<<1 ;
		i= 0 ;
		while ((i-n)>> 31) {
			scanf("%d",p+ i) ; 
			i=i+ 1 ;
		}
		
		i= 0 ;
		while ((i-n)>> 31) {
			
			q[i]= 0 ;
			b=i+ 1 ;
			a=p[i] ;
			while(b) {
				if (b & 01) {
					q[i]=q[i]+a ;
				}
				a=a<< 1 ;
				b=b>> 1 ;
			}
			
			i=i+ 1 ;
		}
		
		i= 0 ;
		while ((i-n)>> 31) {
			p[i]=i+ 1 ;
			i=i+ 1 ;
		}
		
		i= 0 ;
		while ((i-n+ 1)>> 31) {
			j=i+ 1 ;
			while((j-n)>> 31) {
				c=q[j]-q[i];
				if (c>> 31) {
					p[i]=p[i]+ p[j]-(p[j]=p[i]);
					q[i]=q[i]+ q[j]-(q[j]=q[i]);
				}
				j=j+ 1 ;
			}
			i=i+ 1 ;
		}
		
		int ans ;
		j=n>> 1 ;
		while ((j-n+ 1 >> 31)&&(!(q[j]-q[j+ 1]))) {
			j=j+ 1 ;
		}
		ans=p[j] ;
		while (j&&(!(q[j]-q[j- 1]))) {
			if ((p[j]-ans)>> 31) ans=p[j] ;
			j=j- 1 ;
		}
		if ((p[j]- ans)>> 31) ans=p[j] ;
		printf("%d\n",ans) ;
	}
	return 0 ;
}