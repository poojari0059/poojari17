#include <stdio.h>


x(int arr[],int n)
{
    int i,max=0;
    for(i=1;i<n;i++) 
      if(arr[max]<arr[i])
        max=i;
    return max;
    }
main()
{
   int t;
   scanf("%d",&t);
   while(t--)
   {
       int i,n,a[1001],b[1001];
       scanf("%d",&n);
       for(i=0;i<n;i++)
        scanf("%d",&a[i]);
       for(i=0;i<n;i++)
        scanf("%d",&b[i]);
       int flag=1,A=0,B=0,m;
       for(i=0;i<n;i++)
       {
           if(flag) {
                     m=x(a,n);
                     A=A+a[m];
                     a[m]=-1;
                     flag=0;
                    }
           else     {
                     m=x(b,n);
                     B=B+b[m];
                     b[m]=-1;
                     flag=1;
                  
                    }
       } 
       if(A==B)
         printf("TIE\n");    
       else if(A>B)
         printf("KOGA\n");
       else  
         printf("RYUHO\n");
             
   }   
   
 exit(0);
    
}