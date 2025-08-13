#include <stdio.h>




int main()
{
	int t,n,i,flag,rem,f,j[100],k[100],c[100],temp1;
	char a[100],b[100];
	scanf("%d",&t);
	while(t--)
	{
		int l=0,r=0;
		flag=0;
		scanf("%d",&n);
		scanf("%s",a);
		scanf("%s",b);
		for(i=0;a[i]!='\0';i++)
		{
			l++;
			if(a[i]>57)
		        {
		        	temp1=a[i]-'A'+10;
				}
				else
				{
					temp1=a[i]-48;
				}
			if(temp1>=n)
			{
				flag=1;
				break;
			}
			j[i]=temp1;
		}
		for(i=0;b[i]!='\0';i++)
		{
			r++;
				if(b[i]>57)
		        {
		        	temp1=b[i]-'A'+10;
				}
				else
				{
					temp1=b[i]-48;
				}
			if(temp1>=n)
			{
				flag=1;
				break;
			}
			k[i]=temp1;
		}
	
		if(flag==1)
		{
			printf("NA\n");
		}
		else
		{
			if(l>r)
			{
				i=l;
				f=i;
			}
			else
			{
				i=r;
				f=i;
			}
			rem=0;
			c[i]='\0';
			
			for(;;)
			{
				c[i-1]=(j[l-1]+k[r-1]+rem)%n;
				rem=((j[l-1]+k[r-1]+rem)/n);
				l--;
				r--;
				i--;
				if(l<=0||r<=0)
				{
				 
				 break;
			     }
				 
			}
		
			if(r<=0)
			{
				for(;l>0;)
				{
					c[i-1]=((j[l-1]+rem)%n);
					rem=((j[l-1]+rem)/n);
					l--;
					i--;
				}
			}
			else if(l<=0)
			{
		
				for(;r>0;)
				{
					c[i-1]=((k[r-1]+rem)%n);
					rem=((k[r-1]+rem)/n);
					r--;
					i--;
				}
			}
		    if(rem!=0)
			{
			    printf("%d",rem);
			    
			}
			for(i=0;i<f;i++)
			{  if(c[i]>=10)
			{
				printf("%c",c[i]+'A'-10);
			}
			else
			{
				printf("%c",c[i]+'0');
			}
				
			}
			printf("\n");
			
			
		}
	}
	return 0;
}