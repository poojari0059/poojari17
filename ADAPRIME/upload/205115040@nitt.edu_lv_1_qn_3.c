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
int find(char a)
{
	if(a=='a'||a=='e'||a=='i'||a=='o'||a=='u')
	{
		return 1;
	}
	else if(a=='A'||a=='E'||a=='I'||a=='O'||a=='U')
	{
		return 2;
	}
	else if(a>=48&&a<=57)
	{
		return 3;
	}
	else 
	{
		return 0;
	}
}
int main()
{
	int t;
	char a[1000001];
	scanf("%d",&t);
	while(t--)
	{
		scanf("%s",a);
		int len=strlen(a),i;
		long long int count=0,sum=0;
		for(i=0;i<len;i++)
		{
			if(a[i]>=48&&a[i]<=57)
			{
				long long int temp=0;
				while(a[i]>=48&&a[i]<=57&&i<len)
				{
				  temp=temp*10+a[i]-48;
				  i++;
			    }
			    i--;
			     sum=sum+temp;
			}
			else if(i!=0&&i!=len-1)
			{
			    int p,q,r;
			    p=find(a[i]);
			    q=find(a[i-1]);
			    r=find(a[i+1]);
			    if(p!=0)
			    {
			    	if(p==q&&p==r)
			    	 count++;
				}
			}
		}
		printf("%lld\n",count%sum);
	}
	return 0;
}