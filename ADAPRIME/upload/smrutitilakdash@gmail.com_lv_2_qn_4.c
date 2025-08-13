#include <stdio.h>

int f(int a, int b, int c)
    {
    
    if((char)(b) == '+')return a+c;
    if((char)(b) == '-')return a-c;
if((char)(b) == '*')return a*c;

    return 0;
}

int main() {
    char c[2009][100];
    long long int i,j,k,l,m,n,v,count,t,val,has_seen,timer;
  long long  int prin[10000],known[10000];
    scanf("%lld",&t);
  long long  int a,b,op1,op,op2,flag,req;
    while(t--)
        {
        for(i=0;i<1000;i++){prin[i]=0;known[i]=-9999;}
    scanf("%lld",&n);
    scanf("%lld",&a);
    scanf("%lld",&b);
        known[97]=a;
        known[98]=b;
       for(i=0;i<n;i++)
        scanf("%s",c[i]);
        count=0;
        timer=0;
        while(count!=n && timer < 10000)
            {
            timer++;
            for(i=0;i<n;i++)
                {has_seen=0;
                 flag=1;
                 if(known[c[i][0]]!=-9999)continue;
                 
                 req=c[i][0];
                 prin[req]=1;
                 
                    op1=c[i][2];
                    op=c[i][3];
                    op2=c[i][4];
                // printf("i= %lld %lld  op1 ",i,op1);printf("%lld  op ",op);printf("%lld op2 \n------- ",op2);
                 if(known[op1]!=-9999 && known[op2]!=-9999){op1=f(known[op1],op,known[op2]);
              //printf(" %lld  %lld  %lld   %lld  result <- \n",known[c[i][2]],op,known[op2],op1);
                                             }
                 else flag=0;
                 
                for(j=5;(c[i][j] != '\0');j++)
                    {
                    op=c[i][j];
                    op2=c[i][j+1];
                   if(  known[op2]!=-9999)op1=f(op1,op,known[op2]);
                  
                   else flag=0;
                   
                    }
                    
                 if(flag){known[req]=op1;count++;}
                }
        }
        
      //  printf("woeking");
            
            flag=1;  
            for(i=0;i<200;i++)if(prin[i] == 1 && known[i]==-9999){printf("NA");flag=0;}
            
            if(flag)
        for(i=0;i<200;i++)if(prin[i]==1){
            
           printf("%lld ",known[i]);
            
        }
    
printf("\n");
}
    
    
    return 0;
}
