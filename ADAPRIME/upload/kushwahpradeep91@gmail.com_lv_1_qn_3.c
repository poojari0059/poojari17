#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		char s[1000001],ch;
		scanf("%s",s);
		int l=strlen(s),i=0,temp,j;
	unsigned long long int sum=0,c=0,t,k,sum1=0;
		while(i<l)
		{
			if(s[i]>=48&&s[i]<=57){
				j=i+1;
				sum1=s[i]-48;
				while(j!=l)
				{
				  if(s[j]>=48&&s[j]<=57)	
				  {
				  sum1=sum1*10+(s[j]-48);
				  j++;
			     }
			     else
			     break;
				}
				sum+=sum1;
				i=j;
			}
			else
			i++;
		}
		
		
	//	printf("%lld\n",sum);
		
		for(i=0;i<l;i++)
		{
			if(i!=0&&i!=l-1)
			{
				//printf("%d",i);
			if((s[i]=='a'||s[i]=='i'||s[i]=='o'||s[i]=='u'||s[i]=='e'))
			{
				if((s[i-1]=='a'||s[i-1]=='i'||s[i-1]=='o'||s[i-1]=='u'||s[i-1]=='e')&&(s[i+1]=='a'||s[i+1]=='i'||s[i+1]=='o'||s[i+1]=='u'||s[i+1]=='e')) 
				       c++;
			}
			else if((s[i]=='A'||s[i]=='I'||s[i]=='O'||s[i]=='U'||s[i]=='E'))
			{
				if((s[i-1]=='A'||s[i-1]=='I'||s[i-1]=='O'||s[i-1]=='U'||s[i-1]=='E')&&(s[i+1]=='A'||s[i+1]=='I'||s[i+1]=='O'||s[i+1]=='U'||s[i+1]=='E')) 
				       c++;
			}
		}
		}
		
		printf("%d\n",c%sum);
		
	//	printf("%s\n",s);
	}
	return 0;
}