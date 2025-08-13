#include <stdio.h>



struct node{
    int  x; 
    int  y; 
};
struct node a[1005],h;
int z,n,t,i,d;
int main()
{
    scanf("%d",&t);
    while (t--)
    {
    scanf("%d",&n);
    for (i=0;i<n;i++)
        scanf("%d",&a[i].x);
    for (i=0;i<n;i++)
        scanf("%d",&a[i].y);
     z=0;
    for (i = 0 ; i < ( n - 1 ); i++)
    
	
    for (d = 0 ; d < n - i - 1; d++)
    
	
      if (a[d].x+a[d].y < a[d+1].x+a[d+1].y) 
       { 
        h     = a[d];
        a[d]   = a[d+1];
        a[d+1] = h;
       }
    for (i=0;i<n;i++)
     if (i%2==0) z+=a[i].x; 
	 else z-=a[i].y;
     if (z>0) printf("KOGA\n");
	 else if(z==0) printf("TIE\n");
	 else printf("RYUHO\n");
        
    }

    return 0;
}