#include <stdio.h>

int t,n,a[1001],i,j,s,di,p=1;
int su(int x, int y)
{
	return !y?x:su(x ^ y, (~x & y) << p);
}
int ad(int x, int y)
{
        return !y ? x:ad( x ^ y, (x & y) << p);
}
int min(int a,int b)
{
	return ( a<b?a:b);
}
int f(int i, int sc, int s)
{

    if (!i){
    
    if(su(s,sc)>sc)
    return su(su(s,sc),sc);
    else
    return su(sc,su(s,sc));}
    return min(f(su(i,1), ad(sc,a[su(i,1)]), s),
               f(su(i,1), sc, s));
}
int main()
{
	scanf("%d",&t);
g: if(t)
	{
		s=!p;
		scanf("%d",&n);
		i=!p;
		h: if(i<n)
		{
			scanf("%d",&a[i]);
		     s = ad(s,a[i]);
		     i=ad(i,p);
		     goto h;
        }
	
		printf("%d\n",((ad(s,f(n,!p,s)))>>p));
		t=su(t,p);
		goto g;
		
	}
	return !p;
}