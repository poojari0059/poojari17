#include <stdio.h>



int c(int n, int a[100] , int m ,int k)
{
    if (n <= 1)
        return n;
    int res = 0,i;
    for (i = k; i<m && a[i]<=n; i++)
    {
        res += c(n-a[i], a,m,i);
    }
    return res;
}

int co(int i, int a[100],int n)
{
    return c(i+1, a,n,0);
}

int main ()
{
	int t,n,a[1000],i,x,y;
	//scanf("%d",&t);
	
	//while(t--)
	//{
	  scanf("%d",&n);
	  for(i=0;i<n;i++)
	  {
	  	scanf("%d",&a[i]);
	  }
    scanf("%d%d",&x,&y);
    int sum=0;
    
    for(i=x;i<=y;i++)
    {
	   sum=sum+co(i, a,n);
    
    }
    printf("%d\n",sum );
   // }
    return 0;
}