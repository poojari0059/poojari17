#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int vow(char y)
{
	char x=tolower(y);
	if(x=='a'||x=='e'||x=='i'||x=='o'||x=='u')
		return 1;
	else
	    return 0;
}
int che(char x,char y)
{
	if(isupper(x)&&isupper(y))
	{
		if(vow(x)&&vow(y))
			return 1;
	}
	else if(islower(x)&&islower(y))
	{
		if(vow(x)&&vow(y))
			return 1;
	}
	return 0;
}
int check(char arr[])
{
	long int n=strlen(arr);
	long long int i,sum=0,count=0;
	if(isdigit(arr[0]))	sum=sum+arr[0];
	if(isdigit(arr[n-1]))	sum=sum+arr[n-1];
	for(i=1;i<n-1;i++)
	{
		if(che(arr[i],arr[i-1])==1 && che(arr[i],arr[i+1])==1 )
			count++;
		if(isdigit(arr[i]))
			sum=sum+arr[i];	
	}
	return (count%sum);
}
main()
{
	int t,i=0;
	scanf("%d",&t);
	char *arr[t];
	for(i=0;i<t;i++)
	{
			arr[i]=(char *)malloc((100000)*sizeof(char));
			scanf("%s",arr[i]);
			printf("%d\n",check(arr[i]));
	}
	exit(0);
}