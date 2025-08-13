#include <stdio.h>

int t,p=1,q=2;
float b,y,c,d;
int su(int x, int y)
{
	return !y?x:su(x ^ y, (~x & y) << p);
}
void s(int i)
{
	if(!i)
	return;
	scanf("%f %f %f", &b,&y,&c);
	 d=c*(p-c);
	 float ans = b*(p-(q)*d);
	 ans =ans/(q*y*d + ans);
	 printf("%.2f\n",ans);	
	s(su(i,p));
}
int main()
{
	scanf("%d",&t);
    s(t);
	return !p;
}