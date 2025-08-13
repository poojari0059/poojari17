#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	char ch[1000000];
	int t,sum=0,i,j,count=0,len,ans;
	char ch1,ch2;
	scanf("%d",&t);
	while(t--)
	{
		scanf("%s",ch);
		len=strlen(ch);
		for(i=0;ch[i]!='\0';i++)
		{
			if(ch[i]>='A' && ch[i]<='Z')
		  	{
		  		if(i!=0 || i!=len-1)
		  		{
		  		ch1=ch[i];
		      	ch2=ch[i+1];
		      	if((ch1=='A' || ch1=='E'|| ch1=='I'|| ch1=='O'||ch1=='U') && (ch2=='A' || ch2=='E'|| ch2=='I'|| ch2=='O'||ch2=='U'))
		  				{
		  					count++;
		  					i=i+1;
						  }
					}
			}
		
		
			else if(ch[i]>='a' && ch[i]<='z')
		  	{
		  			if(i!=0 || i!=len-1)
		  		{
		      	ch1=ch[i];
		      	ch2=ch[i+1];
		      		if((ch1=='a' || ch1=='e'|| ch1=='i'|| ch1=='o'||ch1=='u') && (ch2=='a' || ch2=='e'|| ch2=='i'|| ch2=='o'||ch2=='u'))
		      		{
		  					count++;
		  					i=i+1;
						  }
					}
				}
					
	     
			else if(ch[i]>='0' && ch[i]<='9')
			{
		    	sum=sum+(ch[i]-'0');
			}		
		}
		ans=count%sum;
		printf("%d\n",ans);
		sum=0;
		count=0;
	}
	return 0;
}