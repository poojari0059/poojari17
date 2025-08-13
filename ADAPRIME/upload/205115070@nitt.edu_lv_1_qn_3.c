#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int sumnumber(char s[])
{
	int i=0;
	int sum=0;
	
	for(i=0;i<strlen(s);i++)
	{
		int total=0;
		if(s[i]>=48 && s[i]<=57)
		{
		total=(s[i]-48);
		int j=i+1;
		while(j<strlen(s))
		{
			if(s[j]>=48 && s[j]<=57)
			{
				total=total*10;
				total=total+(s[j]-48);
				j++;
				i++;
			}
			else
			{
				break;
			}
			}	
		}
	//	i++;
		sum=sum+total;
	}
return sum;
}

int vowel(char s)
{
	int i=0;
if(s=='a' || s=='e' || s=='i' || s=='o' || s=='u')
{
	i=2;
}
if(s=='A' || s=='E' || s=='I' || s=='O' || s=='U' )
{
	i=3;
}
return i;
}

int main()
{
	long long int t;
		scanf("%Ld",&t);
while(t--)
{
        char s[1000000];
		scanf("%s",s);
		long long int sum=0;
		int i;
		
		int count=0;
		for(i=1;i<strlen(s)-1;i++)
		{
			
			int s1=vowel(s[i]);
			int s0=vowel(s[i-1]);
			int s2=vowel(s[i+1]);
			if(s1==2 || s1==3)
			{
          if(s1==s0)
          {
          	if(s1==s2)
          	 {
          		count++;
			  }
		  }
    	    }
	    }
	int ans;
		sum=sumnumber(s);
	if(sum==0)
	{
	ans=0;	
	}
	else
	{
		ans=count%sum;
	}
	

		printf("%d\n",ans);
	}
	return 0;
	
}
