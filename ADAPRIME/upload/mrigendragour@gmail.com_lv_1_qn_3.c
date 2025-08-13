#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	long long int num=0;
	long long int count=0,sum=0,sum1=0;
	int flag=0;
	char str[1000000];
	long long int i;
	int t;
	long long int len;
	scanf("%d",&t);
	while(t--)
	{
	num=0;
	count=0,sum=0,sum1=0;
	flag=0;
	scanf("%s",str);
	len=strlen(str);
  for(i=0;str[i]!='\0';i++)
	{
		if(str[i]>=48 && str[i]<=57)
				flag=1;
		else
		{
			sum1=sum1+sum;
			sum=0;
			continue;
		}
		if(flag==1)
		{
			
			num=str[i]-'0';
			sum=sum*10+num;
			
		}
			
	}
	sum1=sum1+sum;
			sum=sum1;
			
	for(i=1;i<=len-2;i++)
	{
		char c=str[i];
		if(c=='a' || c=='e' || c=='i' || c=='o' || c== 'u')
		{
			c=str[i-1];
			if(c=='a' || c=='e' || c=='i' || c=='o' || c== 'u')
			{
				c=str[i+1];
				if(c=='a' || c=='e' || c=='i' || c=='o' || c== 'u')
						count++;
			}
		}
		else if(c=='A' || c=='E' || c=='I' || c=='O' || c== 'U')
		{
			c=str[i-1];
			if(c=='A' || c=='E' || c=='I' || c=='O' || c== 'U')
			{
				c=str[i+1];
				if(c=='A' || c=='E' || c=='I' || c=='O' || c== 'U')
						count++;
			}
		}
		else
		continue;
		
	}
	 if(count!=0)
	 	printf("%d\n",count%sum);
	else
		printf("0\n");
}
return 0;
}