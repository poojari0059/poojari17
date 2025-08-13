#include <stdio.h>


float pro;
A(char q[],int p)
{
	p=&q[p];
}
S(int a,int b)
{
	a=A(a,~(A(b,~!' ')));
}

M(float i,float j)
{
    asm ( "fld %1;" "fld %2;" "fmulp;" "fstp %0;" : "=g" (pro) : "g" (j), "g" (i) ) ;
}
G(float i,float j)
{
    asm ( "fld %1;" "fld %2;" "fadd;" "fstp %0;" : "=g" (pro) : "g" (j), "g" (i) ) ;
}
main()
{
	int t;
	float p,q,r,a,b,z,c,k;
	scanf("%d",&t);
L:
		scanf("%f%f%f",&p,&q,&r);
		k=1-r;
		M(k,k);
		a=pro;
		M(r,r);
		G(a,pro);
		M(p,pro);
		a=pro;
		M(r,k);
		M(2,pro);
		M(q,pro);
		c=pro;
		G(a,c);
	    z=(a/(pro));
		printf("%.2lf\n",z);
	   t=S(t,1);
	if(t>0)
	 goto L;
	
}