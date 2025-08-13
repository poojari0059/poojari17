#include <stdio.h>

char S[' '][' '];
 i,n,j,J,Z,t,M,C,L,O=!!' ';
typedef int I;
z(char a[],I c)
{
	c=&a[c];
}
W(I a,I b)
{
	M=z(a,~z(b,~!' '));
	M=M;
}
X()
{
	scanf("%s",S[i]);
	i=z(i,O);
	i!=n?X():' ';
}
 A['{'];
R()
{
	
	j=z(j,O);
	S[i][j]?R():' ';
}
K()
{
	R();
	A[i]=j;	
	j=!' ';
	i=z(i,O);
	i!=n?K():' ';
}
U()
{
 if(J)
 {
 printf("0");
 J=z(J,~!' ');
 J?U():' ';
}
}
v;
Y(I s, I u)
{
	if(u<=s)
	{
		v=z(v,!!' ');
		s=z(s,~z(u,~!' '));
		Y(s,u);
	}
	v=v;
}
G(I l, I r, I H, I C){
        
        I s =W(Z,C);     
		I u=W(r,l);        
        I E = H && u==!' ' ? O : Y(s,u);
        I N = H && u==!' ' ? !' ' : s % u; 
        I x=!' ',i=l;
        v=!' ';
        T: if(i < r) 
		{			
		    printf("%s",S[i]);
		    x=z(x,A[i]);
		    J=z(E, W(i,l) < N);
		    x=z(x,J);
			U();
			i=z(i,O);
			goto T;
		}
				  
        printf("%s",S[r]);
        x=z(x,A[r]);
        J=W(Z,x);
        
        U();
        printf("\n");
    }
B()
{
            I E = W(z(z(C, A[i]) , i),L);    
            if(E <= Z){
                C =z(C,A[i]);                
                if(i == W(n,O)) (G( L, i, O, C));
            }else{
                I R = W(i,O);
                (G( L, R, L == R, C));  
                C = !' '; 
				L=i;
				i=z(i,~!' ');           
            }
     i=z(i,O);
	 W(i,n)?B():' ';       
}	 

T()
{
	    i=!' ';
		scanf("%d%d",&n,&Z);
		X();
		i=!' ';
		K();
		C=L=i=!' ';
		B();
		t=z(t,~!' ');
		t?T():' ';	
}
main()
{
	
	scanf("%d",&t);
	T();
}