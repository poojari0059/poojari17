#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

xxxx<stdio.h>
int vovl1(char c)
{
	switch(c)
	{
		case 'a':
			return 1;
		case 'e':
			return 1;
		case 'i':
			return 1;
		case 'o':
			return 1;
		case 'u':
			return 1;
	}
	return 0;
}

int vovl2(char c)
{
	switch(c)
	{
		case 'A':
			return 1;
		case 'E':
			return 1;
		case 'I':
			return 1;
		case 'O':
			return 1;
		case 'U':
			return 1;
	}
	return 0;
}

int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		char str[1000001],c;
		scanf("%s",str);
		int i;
		long long count=0,v=0;
		for(i=1;(c=str[i])!='\0';i++)
		{
			if(c>='0' && c<='9')
			{
				count+=c-'0';
				continue;
			}
			if(vovl1(c) || vovl2(c))
			{
				if((vovl1(str[i-1]) && vovl1(str[i+1])) || (vovl2(str[i-1]) && vovl2(str[i+1])))
				v++;
			}
		}
		printf("%lld\n",v%count);
	}
    return 0;
}