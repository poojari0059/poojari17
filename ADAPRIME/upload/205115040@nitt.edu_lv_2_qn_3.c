#include <stdio.h>

int no(char a)
{
	int t;
	        if(a>='A'&&a<='Z')
			{
				t=a-'A'+10;
			}
			else 
			{
				t=a-'0';
			}
			return t;
}

int main()
{
	int t,n,i,f,c[55],r1,x,y,m1,l,r;
	char a[55],b[55];
	scanf("%d",&t);
	while(t--)
	{
		
		f=l=r=0;
		scanf("%d%s%s",&n,a,b);
		
		for(i=0;a[i];i++)
		l=i;
		for(i=0;b[i];i++)
		r=i;
	   
			r1=0;

			m1=l>r?l:r;
			
			for(i=m1+1;i>0;i--)
			{
				if(r<0)
				 x=0;
				else
				 x=no(b[r]);
				if(l<0)
				  y=0;
				else
				  y=no(a[l]);
				if(x>=n||y>=n)
				{
					f=1;
					break;
				}      
				c[i]=(x+y+r1)%n;
				r1=(x+y+r1)/n;
				l--;
				r--;
			}
			if(f==1)
			 printf("NA");
			else
			{
			  
            f=0;
		    c[0]=r1;
			for(i=0;i<=m1+1;i++)
			{ 
			    if(c[i]!=0||f==1)
			    {
			      if(c[i]>=10)
				  printf("%c",c[i]+'A'-10);
				  else
				  printf("%c",c[i]+'0');
				  f=1;
			    }
			}
			if(f==0)
			 printf("0");
		    }
			printf("\n");
			
		
	}
	return 0;
}