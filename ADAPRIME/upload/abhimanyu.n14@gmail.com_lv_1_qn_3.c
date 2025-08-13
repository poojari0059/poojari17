#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int isVowel(char c)
{	if(c=='a'||c=='A'||c=='e'||c=='E'||c=='i'||c=='I'||c=='o'||c=='O'||c=='u'||c=='U')
	return 1;
	else
	return 0;
}
int sameCase(char c1,char c2)
{	if((int)c1>= 65 && (int)c1<= 90)
	{	if((int)c2>= 65 && (int)c2<= 90)
		{	return 1;	}
	}
	else if((int)c1>= 97 && (int)c1<= 122)
	{	if((int)c2>= 97 && (int)c2<= 122)
		{	return 1;	}
	}
	else
	{	return 0;	}
}
int sum(char str[])
{	int i,sum = 0;
	for(i=0 ; str[i] != '\0'; i++)
	{	if((int)str[i]>=48 && (int)str[i]<=57)
		sum	+= ((int)str[i])-48;
	}
	return sum;
}
int main()
{	unsigned long long int n,sm;
	int t,v,res,i,j;
	char str[100][100],a,b;
	scanf("%d",&t);
	if(t<1 || t>100)
	{	printf("\n Invalid number of Strings.");
		exit(0);
	}
	for(i=0;i<t;i++)
	{	scanf("%s",str[i]);
		for(n=0; str[i][n]!= '\0';n++);
		sm	= sum(str[i]);
		while(n<1 || n>1000000ULL)
		{	printf("\n Invalid String.Enter again.\n");
			scanf("%s",str[i]);
			for(n=0; str[i][n]!= '\0';n++);
		}
		while(sm<1 || n>1000000000000ULL)
		{	printf("\n Invalid String.Enter again.\n");
			scanf("%s",str[i]);
			sm	= sum(str[i]);
		}		
	}
	for(i=0 ; i<t ; i++)
	{	sm	= sum(str[i]);
		v	= 0;
		for(n=0 ; str[i][n] != '\0'; n++);
		for(j=1 ; j<n-1 ; j++)
		{	if(isVowel(str[i][j]) ==1)
			if(isVowel(str[i][j-1]) ==1)
			if(isVowel(str[i][j+1]) ==1)
			if(sameCase(str[i][j],str[i][j-1]) == 1)
			if(sameCase(str[i][j],str[i][j+1]) == 1)
			v++;
		}
		res	= v%sm;
		printf("%d\n",res);
	}
	return 0;
}