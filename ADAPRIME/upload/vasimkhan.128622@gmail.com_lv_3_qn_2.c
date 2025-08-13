#include <stdio.h>


int mul(int a , int b)
{
     int c=0;
    while(b)
    {
       c=c+a;
       b=b-1;        
    }
   return c;   
}

int mod(int a , int b)
{
    int c;
    c=a/b;
    c=mul(c,b);
    c=a-c;
    return c;   
}
int main()

{
    int t,i,j;
    scanf("%d",&t);
    
   while(t)
    {
             int x,m,n;
             int tc,lc;
             scanf("%d%d%d",&x,&m,&n);
             tc=n/m;
             lc=mod(n,m);
             n=mul(tc,m);
             if((lc^0)){
                n=n+lc; 
                tc=tc+1;   
             }
             
             int a[n];
             i=0;
             while(i^n){
                a[i]=0;
                i=i+1;           
             }
          
             int Q=1;
             int T=0;
             i=0;
             while(i^n)
             {
                    j=0;
                    while(j^Q) {
                    
                      if(i^n){
                         a[i]=T;
                         i=i+1;
                       }
                      
                      j=j+1;
                      }
                      
                      
                    T=T+1;
                     if(!(mod(T,x)^0))
                       {
                            T=0;
                            Q=Q+1;       
                       }                  
             
             }
                      
           t=t-1;
           if(!(0^n)) {
            printf("%d %d\n",n,n);
           }
          if((0^n)) {
           
          lc=a[n-1]+1;
          printf("%d %d\n",lc,tc);          
          }
	
	}   
   
    return 0;
    
    
}
