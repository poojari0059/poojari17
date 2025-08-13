#include <stdio.h>


int main()
{
	int t,i;
	scanf("%d",&t);
	while(t--)
	{
		int a,b,n;
		scanf("%d%d%d",&n,&a,&b);
		int p[300],q[300];
		char s[25][25];
		p['a']=p['b']=1;
		q['a']=a;
		q['b']=b;
		for(i=0;i<n;i++)
		 {
		 	scanf("%s",s[i]);
		 }
		int z=0,c=0; 
	
		while(1)
		{
			int flag=0;
			for(i=0;i<n;i)
			{
			   if(s[i][2]=='+' || s[i][2]=='-')
			   {
			   		if(s[i][4]=='\0' && p[s[i][3]])
			   	  	{
			   	  		 if(!p[s[i][0]] && s[i][2]=='-' )
			   	  	 	{	
			   	  	    	p[s[i][0]]=1;
			   	  	    	q[s[i][0]]=-q[s[i][3]];
			   	  	    	flag=1;
			   	  	    	c++;
			   	  	    	break;
					 	}
					 	else if(!p[s[i][0]] && s[i][2]=='+')
			   	  	 	{
			   	  	    	p[s[i][0]]=1;
			   	  	    	q[s[i][0]]=q[s[i][3]];
			   	  	    	flag=1;
			   	  	    	c++;
			   	  	    	break;
					 	}
				  	}
				  	else
				  	{
				  		 if(!p[s[i][0]] && p[s[i][3]] && p[s[i][5]])
			   	  	 	{
			   	  	 		int t1,t2,t3;
			   	  	 		if(s[i][2]=='-')
			   	  	 		  t1=-q[s[i][3]];
			   	  	 		else
							  t1=q[s[i][3]];	    
			   	  	 	    t2=q[s[i][5]];
			   	  	    	p[s[i][0]]=1;
							if(s[i][4]=='+')
							{
								t3=t1+t2;
							}
							else if(s[i][4]=='-')
							{
								t3=t1-t2;
							}	
							else
							{
								t3=t1*t2;
							}
							q[s[i][0]]=t3;
							flag=1;
							c++;
					 	}
						
					 		
					  }
				}
				else  if(s[i][3] && s[i][2]>='a' && s[i][2]<='z')
				{				
					if(!p[s[i][0]] && p[s[i][2]] && p[s[i][4]])
					{
						p[s[i][0]]=1;
						int t1,t2,t3;
			   	  	 		
						    t1=q[s[i][2]];	    
			   	  	 	    t2=q[s[i][4]];
			   	  	    	p[s[i][0]]=1;
							if(s[i][3]=='+')
							{
								t3=t1+t2;
							}
							else if(s[i][3]=='-')
							{
								t3=t1-t2;
							}	
							else
							{
								t3=t1*t2;
							}
							q[s[i][0]]=t3;
						flag=1;
						c++;
				   		break;
					}
			   }
			   else if(!s[i][3])
			   {
			   	    if(!p[s[i][0]] && p[s[i][2]]){	 
			   	  	p[s[i][0]]=1;
			   	  	q[s[i][0]]=q[s[i][2]];
			   	  	c++;
			   	  	flag=1;
			   	  	break;
			      }
			   }
			}
			if(c==n)
			 break;
			if(flag==0)
			{
				z=1;
				break;
			} 
		}
		if(z==1)
		{
			printf("NA\n");
		}
		else
		{
			for(i='c';i<='z';i++)
			{
				if(p[i]==1)
				{
					printf("%d ",q[i]);
				}
			}
			printf("\n");
		}
	}
	return 0;
}