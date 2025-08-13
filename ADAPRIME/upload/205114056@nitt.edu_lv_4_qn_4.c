#include <stdio.h>

typedef int D;
D g,t,N['{'],i=!!' ',M,n,J,W=!!' ';
R(D a, D b)
{
	J=sizeof(char [a][b]);
	J=J;
}
F(D a[],D s,D S)
{	
	if(s==n)
	{
		if(S>M)
		M=S;
		return;
	}
D i=W,j, e=z(n,~(z(s,~!' ')));
U:	
{

       D b['{'],k=W;
		b[!' ']=j=W;
		
	 B:	
		if(i!=j)
		b[k]=a[j],k=z(k,W);
		j=z(j,W);	
		if(j<=e)
		goto B;
		b[k]=W;	
		F(b,z(s,W),z(S,(R(R(a[z(i,~!' ')],a[i]),a[z(i,W)]))));
	}
		i=z(i,W);
		if(i<=e)
		goto U;
	
}

z(char a[],D c)
{
	c=&a[c];
}
P()
{	scanf("%d",&g);
	g=g;
}


V()
{
	N[i]=P();
	i=z(i,W);
	i<=n?V():' ';
}
E()
{
	if(R(i,i)<=M)
		i=z(i,W),E();
	
}
Y()
{
	n=P();
	V();
	t=z(t,~!' ');
	N[!' ']=N[z(n,W)]=W;
	F(N,!' ',!' ');
	i=W;
	E();
	printf("%d\n",z(i,~!' '));	  
	M=!' ';
	i=W;
	t?Y():' ';
}
 main()
{
	t=P();
    Y();
}