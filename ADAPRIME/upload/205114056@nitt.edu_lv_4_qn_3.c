#include <stdio.h>


typedef float U;
U P(U i, U j)
{
	U W;
	 asm  ( "fld %1;"
                            "fld %2;"
                           
                            "fmul;"
                            "fstp %0;" 
                            : "=m" (W) 
                            : "m"(i), "m" (j));
    return W;
}

U Q(U i, U j)
{
	U W;
	 asm  ( "fld %1;"
                            "fld %2;"
                           
                            "fdiv;"
                            "fstp %0;" 
                            : "=m" (W) 
                            : "m"(i), "m" (j));
    return W;
}
U R(U i, U j)
{
	U W;
	 asm  ( "fld %1;"
                            "fld %2;"
                           
                            "fadd;"
                            "fstp %0;" 
                            : "=m" (W) 
                            : "m"(i), "m" (j));
    return W;
}

t;
z(char a[],int c)
{
	c=&a[c];
}
Y()
{
     	U a,b,c,F,f,A,q,o,i,j,p;
		scanf("%f%f%f",&a,&b,&c);
		q=P(R(~!' ',c),~!' ');
		p=P(q,q);
		i=P(c,c);
		F=P(a,R(p,i));       
	    p=P(c,q);
	    p=P(z(!!' ',!!' '),p);
	    f=P(b,p);
		A =Q((R(F,f)),F);		
		printf("%.2f\n",A);	
		t=z(t,~!' ');
		t?Y():' ';
}
 main()
{
	t;	
	scanf("%d",&t);
   Y();
}