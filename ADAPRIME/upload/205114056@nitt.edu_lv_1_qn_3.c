#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int findSum(char str[])
{
	// A temporary string
	char temp[1001];

	
	int sum = 0;
    int i=0;
    int j=0;
	while(str[i])
	{
	    char ch=str[i];
		if (isdigit(ch))
			{
			    temp[j]=ch;
			    j++;
			}

	
		else
		{
		    temp[j]='\0';
			sum += atoi(temp);
			j=0;
		
		}
		i++;
	}

    temp[j]='\0';
	return sum + atoi(temp);
}

int check(char ch)
{
	if(ch<='9')
	return 0;
	if(ch>='a')
	{
		if(ch=='a' || ch=='e' || ch=='i' || ch=='o' || ch=='u')
		return 1;
	}
	else if(ch>='A')
	{
			if(ch=='A' || ch=='E' || ch=='I' || ch=='O' || ch=='U')
			return 2;
	}
	else
	{
		return 15;
	}
	return 5;
}
int main()
{
   long long int n,i,t,j,k;
   float jj;
   scanf("%d",&t);
   while(t--)
   {
      char str[1000001];
      scanf("%s",str);
      i=0;
      long long int sum=0,c=0;
      sum=findSum(str);
      j=strlen(str)-1;
	  for(i=1; i<j; i++)
	  {
	  
	    if((check(str[i])==1 || check(str[i])==2))
	  	{		  
	  	int l=check(str[i-1]);
	  	if(l==1 || l==2)
	  	{
	  		
	  		if(str[i+1])
	  		{
	  			int r=check(str[i+1]);
	  			if(l==r && (l==1  || l==2))
	  			{
	  			//	printf("%c\n",str[i]);
	  				c++;
		     	}
	    	}
			
		}
		
	   }
		
   }
  //printf("%lld %lld \n",c,sum);
	  

	  printf("%lld\n",c%sum);
	
	  
   }
}