#include <stdio.h>

typedef int D;
 t,x,d,n,m,s[' '];
z(char a[],D c)
{
	c=&a[c];
}
A(D a,D b)
{
	a<b?(s[!' ']=z(b,~(z(a,~!' '))),s[!!' ']=b):(s[!' ']=z(a,~(z(b,~!' '))),s[!!' ']=a);
	
}
 F(D r[], D s1,D s2,D i)
{

    if(i==n)
    {
    	
    	A(s1,s2);
    	if(d>s[!' '])
    	d=s[!' '],m=s[!!' ']; 
		return;   	
	}
	
	F(r,z(s1,r[i]),s2,z(i,!!' '));
	F(r,s1,z(s2,r[i]),z(i,!!' '));
}
 O['  '],i;
P()
{
  scanf("%d",&x);
  x=x;	
} 
Y()
{
	O[i]=P();
	i=z(i,!!' ');
	i!=n?Y():' ';
}
X()
{
	n=P();
	d='   ';
	Y();
	F(O,!' ',!' ',!' ');
	t=z(t,~!' ');
	i=!' ';
	printf("%d\n",m);
	t?X():' ';
}
main()
{

	t=P();
	X();
}