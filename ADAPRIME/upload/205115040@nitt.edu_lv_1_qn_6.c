#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


long long int power(long long int x, long long int y)
{
    long long int temp;
    if( y == 0)
       return 1;
    temp = power(x, y/2);       
    if (y%2 == 0)
        return temp*temp;
    else
    {
        if(y > 0)
            return x*temp*temp;
        else
            return (temp*temp)/x;
    }
}  
int findtwo(int x)
{
	int count=0;
	while(x!=0)
	{
		if(x%2==0)
		{
			count++;
		}
		else
		{
			break;
		}
		x=x/2;
	}
	return count;
}
int findfive(int x)
{
	int count=0;
	while(x!=0)
	{
		if(x%5==0)
		{
			count++;
		}
		else
		{
			break;
		}
		x=x/5;
	}
	return count;
}
int main()
{
	long long int x,y,h,l,t;
	scanf("%lld",&t);
	while(t--)
	{
		scanf("%lld%lld",&h,&l);
		
		
		long long int sum = (4*h-l)/2;
		 if(((4*h-l)%2!=0||sum<0||l<0||h<0||l-sum<0)||(l==0&&h!=0)||(h==0&&l!=0))
		{
			printf("-1\n");
		}
		else
		{
			printf("%lld\n",sum);
		}
	 }	
	
	return 0;
}