#include <stdio.h>


char s[50][10];
int getsize(char str[])
{
	int i=0;
	while(str[i]!='\0')
		i++;
		
	return i;
}
int find(char ch,int n,int arr[])
{
	int i=0;
	while(i<n)
	{
		if(s[i][0]==ch)
		{
			return i;
			break;
		}
		i++;
	}
	return -1;
}

void calculate(int n,int a[])
{
   	   int i,j,t,l,c=0;
   	   char ch='c',v1,v2,v3;
   	   for(i=2;i<26;i++)
   	   {
   	   	    for(j=2;j<26;j++)
   	   	    {

   	   	    int k=find(ch,n,a);
   	   	   if(k!=-1)
   	   	{
		    
   	   	   l=getsize(s[k]);
   	   	   if(l>4)
   	   	   {
		   	   	if(l==5)
		   	   	{
   	   	   			 v1=s[k][2];
   	   	   	         v2=s[k][4];
   	   	   		    if(s[k][3]=='+')
					{
						t=(a[v1-'a']+a[v2-'a']);
						a[ch-'a']=t;
					}
					else if(s[k][3]=='-')
					{
						t=(a[v1-'a']-a[v2-'a']);
						a[ch-'a']=t;
					}
					else 
					{
						t=(a[v1-'a']*a[v2-'a']);
						a[ch-97]=t;
					}	
		      	 }
		   	   	    	else if(l==6)
		   	   	   	{
		   	   	   	    v3=s[k][2];
		   	   	   	        if(v3=='-')
		   	   	   	        {
									 
					   	   	   	    v1=s[k][3];
					   	   	   	    v2=s[k][5];
					   	   	   	    if(s[k][4]=='+')
					   	   	   	    {
					   	   	   	    	t=((-1*(a[v1-'a']))+a[v2-'a']);
					   	   	   	    	a[ch-'a']=t;
							    	 }
							    	  if(s[k][4]=='-')
					   	   	   	    {
					   	   	   	    	t=((-1*(a[v1-'a']))-a[v2-'a']);
					   	   	   	    	a[ch-'a']=t;
							    	 }
							    	   if(s[k][4]=='*')
					   	   	   	    {
					   	   	   	    	t=((-1*(a[v1-'a']))*a[v2-'a']);
					   	   	   	    	a[ch-'a']=t;
							    	 }	
							}
							else{
											v1=s[k][2];
										 	v2=s[k][5];
										 	if(s[k][3]=='+')
							   	   	   	    {
							   	   	   	    	t=((a[v1-'a'])+(-1*a[v2-'a']));
							   	   	   	    	a[ch-'a']=t;
									    	 }
									    	  if(s[k][3]=='-')
							   	   	   	    {
							   	   	   	    		t=((a[v1-'a'])-(-1*a[v2-'a']));
							   	   	   	    	a[ch-'a']=t;
									    	 }
									    	   if(s[k][3]=='*')
							   	   	   	    {
							   	   	   	    	t=((a[v1-'a'])*(-1*a[v2-'a']));
							   	   	   	    	a[ch-'a']=t;
									    	 }			
													
													
								
						     	}
						  		 
					 }
						 else if(l==7)
						 {
						    v1=s[k][3];
			   	   	   	    v2=s[k][6];
			   	   	   	    int t1=a[v1-'a'];
			   	   	   	    int t2=a[v2-'a'];
							t=((-1*t1)*(-1*t2));
							a[ch-'a']=t;		 	
						 }
				 }
				 else
				 {
				 	
				 	if(l==4)
				 	{
				 		v1=s[k][3];
				 		a[ch-'a']=(-1*a[v1-'a']);
					 }
					 else
					 {
					 	v1=s[k][2];
				 		a[ch-'a']=(a[v1-'a']);
					 }	
				  }		 
				 
		    }
		    ch++;
		}
	}	
	i=2;
	while(i<26)
	{
		if(a[i]>=-9999999&&a[i]<=9999999)
		c++;
		i++;
	}
	if(c==n)
	{
		for(i=2;i<26;i++)
		{
			if(a[i]>=-9999999&&a[i]<=9999999)
			printf("%d ",a[i]);
			
		}
	}
	else{
		printf("NA");
	}
		 
}
int main()
{
	int t,i;
	scanf("%d",&t);
	while(t--)
	{
		int n,a,b;
		scanf("%d%d%d",&n,&a,&b);
	
		int a1[26];
		for(i=0;i<26;i++)
		a1[i]=99999999;
		a1[0]=a;
		a1[1]=b;
		for(i=0;i<n;i++)
		{
			scanf("%s",&s[i]);
		} 
	    calculate(n,a1);
		printf("\n");
		
	}
}