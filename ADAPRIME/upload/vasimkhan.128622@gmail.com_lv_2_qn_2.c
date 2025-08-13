#include <stdio.h>


int I=1000,n;
int D(int F[][n],int A,int C)
{
    int E[n],P[n],S[n],i,m,min,B,d,j;
    for(i=0;i<n;i++) S[i]=0;
    char path[n];
    for(i=0;i<n;i++)
    {
        E[i] =I;
        P[i] = -1;
    }
    B = A;
    S[B]=1;
    E[B] = 0;
    while(S[C] ==0)
    {
        min =I;
        m = 0;
        for(i=0;i<n;i++)
        {
            d = E[B] +F[B][i];
            if(d< E[i]&&S[i]==0)
            {
                E[i] = d;
                P[i] = B;
            }
            if(min>E[i] && S[i]==0)
            {
                min = E[i];
                m = i;
            }
        }
        B = m;
        S[B] = 1;
    }
    B = C;
    j = 0;
    return E[C];
}
main()
{
  int r,s,t,u,v,d;
    scanf("%d%d%d%d",&n,&r,&s,&t);

    int F[n][n],i,j,w,ch,co;
    int A, C,x,y;

    for(i=0;i<n;i++)
    for(j=0;j<n;j++)
    F[i][j] =I;

    for(i=0;i<r;i++){
       scanf("%d%d%d",&u,&v,&d);
       F[u][v] = F[v][u] = d;
    }
    j=0;
    for(i=1;i<n;i++){
    co = D(F,0,i);
    if((2*co)<=(s*t))
       j++;

    }
    printf("%d\n",j);

   exit(0);
}
