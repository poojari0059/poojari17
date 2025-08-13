#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,len,a,b,count=0,i,j,c,n,ans[1000];
char str[1000000],arr[100000];
unsigned long sum=0;

scanf("%d",&t);

	while(t--)
	{
		i=0;
		
		
		
	scanf("%s",str);
		
		len=strlen(str);
		
		count=0;
		
		while(str[i])
		{
			a=str[i]-48;
		
			
	     
	     
		
			if((a<=9 && a>=0))
			{
				j=0;
						
			if(i<len-1)
			b=str[i+1]-48;
			arr[j++]=str[i];
			
			while(b<10)
			{
			arr[j++]=str[i+1];
			i++;
			if(i<len-1)
			b=str[i+1]-48;
		    
		    
			}
			
		    
			
			
			c=atoi(arr);
			sum+=c;
		  }
		    
						   
		
			
		
			
			if(i>0 && i<(len-1))
			{                             
			
	    	if( (str[i]=='a' ||str[i]=='e'||str[i]=='i' ||str[i]=='o'||str[i]=='u' )  &&  (str[i+1]=='a' || str[i+1]=='e'||str[i+1]=='i' ||str[i+1]=='o'||str[i+1]=='u' )&&  (str[i-1]=='a' || str[i-1]=='e'||str[i-1]=='i' ||str[i-1]=='o'||str[i-1]=='u'  ) )
			count++;
			
				
			if( (str[i]=='A' ||str[i]=='E'||str[i]=='I' ||str[i]=='O'||str[i]=='U') &&  (str[i+1]=='A' || str[i+1]=='E'||str[i+1]=='I' ||str[i+1]=='O'||str[i+1]=='U')  && ( str[i-1]=='A' || str[i-1]=='E'||str[i-1]=='I' ||str[i-1]=='O'||str[i-1]=='U') )
			count++;
			
	          }
			
			i++;
			
		
	}
	
	
		ans[n++]=count%sum;
		sum=0;
count=0;	
	
}


for(i=0;i<n;i++)
printf("%d\n",ans[i]);




 exit(0);	
	


	
}



