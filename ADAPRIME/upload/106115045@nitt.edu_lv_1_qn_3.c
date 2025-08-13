#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
int t,i;
scanf("%d",&t);
for(i=0;i<t;i++)
{
char str[1000005];
scanf("%s",&str);
int j;
long long int sum=0,val=0,v=0;
int n=strlen(str);
for(j=0;j<strlen(str);j++)
{
	if(str[j]>'0'&&str[j]<='9')
	{
		if(str[j+1]>'0'&&str[j+1]<='9'&&j!=n-1){
			val=val*10+(str[j]-'0');
		}
		else
		{
			val=val*10+(str[j]-'0');
			sum+=val;
			val=0;
		}
		
	}
		if(str[j]-'a'>=0&&str[j]-'a'<26)
		{
			if(str[j]=='a'||str[j]=='e'||str[j]=='i'||str[j]=='o'||str[j]=='u')
			{
				if((j!=0&&(str[j-1]=='a'||str[j-1]=='e'||str[j-1]=='i'||str[j-1]=='o'||str[j-1]=='u'))&&(j!=n-1&&(str[j+1]=='a'||str[j+1]=='e'||str[j+1]=='i'||str[j+1]=='o'||str[j+1]=='u')))
				v++;
			}
		}
		if(str[j]-'A'>=0&&str[j]-'A'<26)
		{
			if(str[j]=='A'||str[j]=='E'||str[j]=='I'||str[j]=='O'||str[j]=='U')
			{
				if((j!=0&&(str[j-1]=='A'||str[j-1]=='E'||str[j-1]=='I'||str[j-1]=='O'||str[j-1]=='U'))&&(j!=n-1&&(str[j+1]=='A'||str[j+1]=='E'||str[j+1]=='I'||str[j+1]=='O'||str[j+1]=='U')))
				v++;
			}
		}		
}
	printf("%d\n",v%sum);
}
return 0;
}