#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

long long int max(long long int a,long long int b)
{
	return a>b?a:b;
}

long long int Ghanta_Count_3(long long int n)
{
   
   if (n < 3)
      return 0;
  long long int d = log10(n);
  long long int i;
  long long int a[10];
   a[0] = 0, a[1] = 1;
   for (i=2; i<=d; i++)
      a[i] = a[i-1]*9 + ceil(pow(10,i-1));
   long long int p = ceil(pow(10, d));
   long long int Count = n/p;
   if (Count == 3)
      return (Count)*a[d] + (n%p) + 1;
   if (Count > 3)
      return (Count-1)*a[d] + p + Ghanta_Count_3(n%p);
}
int Hai_Kya(long long int x)
{
    while (x != 0)
    {
        if (x%10 == 3)
           return 1;
        x   = x /10;
    }
    return 0;
} 
long long int Lelo_Count(long long int l,long long int n)
{
    long long int result = 0,x; // initialize result
   for (x=l; x<=n; x++)
        result += Hai_Kya(x)? 1 : 0; 
    return result;
}


void solve(long long int n)
{
    	long long int temp,ones;
		long long int temp2;
		long long int bit=0,bit2=0;
		temp=n;
		temp2=n;
		while(temp%2!=1)
		{
			temp/=2;
			bit++;
		}
		bit2=bit;
		while(temp%2!=0)
		{
			temp2-=1<<bit2;
			temp/=2;
			bit2++;
		}
		temp2+=(1<<bit2);
		ones=bit2-bit-1;
		long long int ex=(1<<ones)-1;
		temp2+=ex;
		printf("%d\n",temp2);
}
 int main()
{
	long long int t;
	scanf("%d",&t);
	while(t--)
	{
	  long long int X1,X2,Y1,Y2;
	  scanf("%lld%lld",&X1,&X2);	  
	  Y1=Ghanta_Count_3(X1);
	  Y2=Ghanta_Count_3(X2-1);	
	  printf("%lld\n",(X2-X1-1)-Lelo_Count(X1+1,X2-1));
	 
    }
    return 0;
   
}