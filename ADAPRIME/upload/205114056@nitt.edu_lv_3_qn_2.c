#include <stdio.h>

int max(int x, int y)
{
  return x - (( x - y ) & (( x - y ) >> ( 31 )));
}
int multi(int x, int y)
{
   
   if(! y )
     return 0 ;
 

   if( max( y , 0 ) )
     return ( x + multi ( x , y - 1)) ;
  
  
   if( ! max( y , 0 ))
     return - multi ( x ,  - y ) ;
}
int mod(int a,int b)
{
			int count =0 ;
			count = a / b ;
			a = a - multi(count , b) ;
			return a;
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t)
	{
		int x,n,m,i,ans1,ans2,sum;
		scanf("%d%d%d",&x,&m,&n);
		if(!mod(n,m))
		{
			ans2=n/m;
		}
		if(mod(n,m))
		{
			ans2=(n/m)+1;
		}
		i=1;
		sum=n;
		while(max((sum-multi(x,i)),0))
		{
			sum=sum-multi(x,i);
			i=i+1;
		}		
		if(!mod(sum,i))
		{
			ans1=sum/i;
		}
		if(mod(sum,i))
		{
			ans1=(sum/i)+1;
		}
		printf("%d %d\n",ans1,ans2);
		t=t-1;
	}
	return 0;
}