#include <stdio.h>



int sum(int a , int b)
{
    return a+b;   
}

int sub(int a , int b)
{
    return a-b;   
}

int mul(int a , int b)
{
    int c=0;
    int neg  = 0;
    int res = max(b,0);
    int res2 = max(a,0);
    
    if(!(0^res)) 
    {
        b=b-b-b;
        neg=neg+1;
        
    }
    if(!(0^res2)) 
    {
        a=a-a-a;
        neg=neg+1;
    }
     
    while(b)
    {
       c=c+a;
       b=b-1;        
    }
    
    if(!(1^neg)) 
      return -c;
   return c;   
}
int xx(int a , int b)
{
    return a/b;   
}

int min(int x, int y)
{
  if(!(x^y)) return 0; 
          
  return y + ((x - y) & ((x - y) >>31));
}

int max(int x, int y)
{
  if(!(x^y)) return 0;  
  return x - ((x - y) & ((x - y) >>31));
}
 
 
int mod(int a , int b)
{
    int c;
    c=a/b;
    c=mul(c,b);
    return a-c;   
}

 int main()
 {
     int t;
     scanf("%d",&t);
     while(t)
     {
          int z,x,y,ans;
          scanf("%d%d%d",&z,&x,&y);
          if(!(1^z)) 
           ans=sum(x,y);
          if(!(2^z)) 
           ans=sub(x,y);
          if(!(3^z)) 
           ans=mul(x,y);
          if(!(4^z)) 
           ans=xx(x,y);
          if(!(5^z)) 
           ans=max(x,y);
          if(!(6^z)) 
           ans=min(x,y);
          if(!(7^z)) 
           ans=mod(x,y);
          
          printf("%d\n",ans);  
 
         t=t-1;
                    
     }    
     
     
     return 0;
     
 }
