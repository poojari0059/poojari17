#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int check(char a,char b,char c)
{
	if((a=='a' || a=='e' || a=='i' || a=='o' || a=='u')&&(b=='a' || b=='e' || b=='i' || b=='o' || b=='u')&&(c=='a' || c=='e' || c=='i' || c=='o' || c=='u'))
	return 1;
	if((a=='A' || a=='E' || a=='I' || a=='O' || a=='U')&&(b=='A' || b=='E' || b=='I' || b=='O' || b=='U')&&(c=='A' || c=='E' || c=='I' || c=='O' || c=='U'))
	return 1;
	return 0;
}

int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		char s[100000];
		long int sum=0;
		scanf("%s",s);
		int l=strlen(s),i;
		if(s[0]>='1' && s[0]<='9')
		sum+=(s[0]-'0');
		if(s[l-1]>='1' && s[l-1]<='9')
		sum+=(s[l-1]-'0');
		int p=0;
		long int z=0;
		for(i=1;i<l-1;i++)
		{
			if(s[i]>='0' && s[i]<='9')
			{
				z=z*10+(s[i]-'0');				
				continue;
			}
			sum+=z;
			z=0;
			if(check(s[i],s[i-1],s[i+1]))
			p++;
		}
		sum+=z;
		printf("%d\n",(p%sum));
	}
	return 0;
}