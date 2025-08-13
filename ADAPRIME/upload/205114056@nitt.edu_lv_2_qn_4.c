#include <stdio.h>

int Z(int a,int b,char c)
{
	int s;
	if(c=='+')
	s=a+b;
	if(c=='-')
	s=a-b;
	if(c=='*')
	s=a*b;
	return s;
}
main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int f=0,w=0,A[256]={0},B[256]={0},a,b,c=0,n,i;
		char p,q,r,s,z,S[30][7];
		scanf("%d%d%d",&n,&a,&b);
		A['a']=A['b']=1;
		B['a']=a;
		B['b']=b;
		
		for(i=0; i<n; i++)
		scanf("%s",S[i]);
		while(1)
		{
			f=0;
			for(i=0; i<n ; i++)
			{
				p=S[i][3];
				s=S[i][0];
				q=S[i][2];
				r=S[i][4];
				z=S[i][5];
			    if(!A[s]){				 
				if(p && q>96)
				{				
					if(A[q] && A[r])
					{
						A[s]=1;
						B[s]=Z(B[q],B[r],p);
						f=1;
						c++;
				   		
					}
			   }
			   else if(q=='-')
			   {
			   		if(!r && A[p] )
			   	  	{
			   	  		A[s]=1;
			   	  		
			   	  	    	B[s]=-B[p];
					     	c++;
			   	  	    	f=1;
			   	  	    	
				  	}
				  	else
				  	{
				  		
				  	  if(A[p] && A[z])
			   	  	 	{			   	  	 	
			   	  	    	A[s]=1;
							B[s]=Z(-B[p],B[z],r);
							f=1;
							c++;
					 	}	
				  	}		
			   }
			   else if(!p)
			   {			   	  
			   	  if(A[q]){	 
			   	  	A[s]=1;
			   	  	B[s]=B[q];
			   	  	c++;
			   	  	f=1;
			   	  
			      }
			   }
		      }
			}
			if(c==n)
			break;
			if(!f)
			{
				w=1;
				printf("NA\n");
				break;				
			}
		}
		if(!w)
		{
			for(i=2; i<26; i++)
				if(A[97+i])
					printf("%d ",B[97+i]);
			printf("\n");
		}
	}
	
}