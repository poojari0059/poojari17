#include <stdio.h>


int max(int x, int y)
{
  return x/y;
}

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

int sort(int a[],int n,int x)
{
   int i,j,k,index;
    
   i=0;
   while(i^x){
         
         index=i;
         j=i+1;
         while(j^n){
            if(max(a[index],a[j]))
               index=j;
         j=j+1;           
         }
         k=a[index];
         a[index]=a[i];
         a[i]=k;
       i=i+1;             
   }
  
        
   return a[x-1];    
}
int main()
{
    int t;
    scanf("%d",&t);
    while(t){
             
         int n,ans;
         scanf("%d",&n);
         int N=mul(n,2);    
         int arr[N];
         int val[N];
         int i=0;
         while(i^N){
           int a;         
           scanf("%d",&a);
           val[i]=arr[i]=mul(i+1,a);  
           i=i+1;            
          }
        ans=sort(arr,N,n+1);
        int flag=0;  
        i=0;   
        while(i^N){
           
           if(!(ans^val[i]))  
                   {
                      flag=i;
                      i=N-1;
                   } 
              i=i+1;        
        }
        printf("%d\n",flag+1);
         t=t-1;             
    }    
    

    return 0;
    
}
