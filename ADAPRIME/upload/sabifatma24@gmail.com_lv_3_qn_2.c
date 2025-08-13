#include <stdio.h>

int x,m,n,i,j,ct,ci,k,z;
int _fun_(){
	ci=ct=0;
	z=m;
	i=0;
	m=1;
	while(1) {
		j=0;
		while(j!=x) {
			k=0;
			while(k!=i+1) {
				ct=ct+1;
				if(!(ct!=m)){
					ci=ci+1;
					m=m+z;
				}
				if(!(ct!=n))
					return 1;
				k=k+1;
			}
			if(k!=i+1)
				return 1;
			j=j+1;
		}
		if(j!=x)
			return 1;
		i=i+1;
	}
	return 1;
}
int main(){
	int t;
	scanf("%d",&t);
	while(t!=0){
		scanf("%d%d%d",&x,&m,&n);
		_fun_();
		printf("%d %d" ,j+1,ci);
		t=t-1;
	}
	return 0;
}