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
	int testme;
	float new1;
	int new2;
	scanf("%d",&testme);
	while(testme--)
	{
		scanf("%f%d",&new1,&new2);
		int new3=2*(new1+1-new2);
		printf("%d\n",new3);
	}
	return 0;
}