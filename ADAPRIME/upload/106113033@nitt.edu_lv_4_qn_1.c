#include <stdio.h>

int d[1005][1005],t,i,j,S[1<<4],a,b,m,w,p=1;
int su(int x, int y)
{
	return !y?x:su(x ^ y, (~x & y) << p);
}
int ad(int x, int y)
{
        return !y ? x:ad( x ^ y, (x & y) << p);
}
void sc(int i)
{
	if(i==m)
	return;
	scanf("%d", &S[i]);
    sc(ad(i,p));
}
int cnt(int m,int n)
{	
    if (!n)
        return p;
    if ((m <=!p && n >= p) || n<!p)
        return !p;
    if(d[m][n])
	return d[m][n];
    
    return d[m][n]= ad(cnt(m - 1, n ), cnt(m, n-S[m-1] ));
}
void rs(int i)
{
	if(i>b)
	return;
	w= ad(w,cnt(m,i));
    rs(ad(i,p));
}
int main()
{
     	scanf("%d",&m);
       sc(!p);
       scanf("%d %d", &a, &b);
       cnt(m,b);
       rs(a);
       printf("%d\n",w);		    	    
       return !p;
}