#include <stdio.h>

int pow1(int a,int x)
{
	int i,s=1;
	for(i=0;i<x;i++)
	s*=a;
	return s;
}
long long int todec(int base,int i,char a[])
{
	long long int n=0;
	int x,j=0;
	while(a[i])
	{
		if(i==-1) break;
		if(a[i]>56)
		x=a[i]-'A'+10;	
		else x=a[i]-'0';
		n+=x*pow1(base,j++);
		i--;
	}
	return n;
}
void sum(int base,char a[],char b[])
{
	long long int sum,temp1,temp2,i=0,j=0;
	while(a[i++]);
	while(b[j++]);
	i-=2;
	j-=2;
		//temp1=todec(base,i,a);
		//temp2=todec(base,j,b);
		
	sum=temp1+temp2;
	//convert(sum,base);
}
int check(int base,char a[],char b[])
{
	int i=0,m,n;
	while(a[i])
	{
		if(a[i]>56)
		{
			if(a[i]-'A'+10>base)
			return 0;
		}
		else {
			if(a[i]-'0'>=base)
			return 0;
		}
		i++;
	}
	i=0;
	while(b[i])
	{
		if(b[i]>56)
		{
			if(b[i]-'A'+10>=base)
			return 0;
		}
		else {
			if(b[i]-'0'>=base)
			return 0;
		}
		i++;
	}
	return 1;
}
int main()
{
	int t;
	scanf("%d",&t);
	/*while(t--)
	{
		char a[52],b[52];
		int base;
		scanf("%d%s%s",&base,a,b);
		if(check(base,a,b)==0)
		printf("NA\n");
		else {
			sum(base,a,b);
		}
	}*/
	return 0;
}xyz