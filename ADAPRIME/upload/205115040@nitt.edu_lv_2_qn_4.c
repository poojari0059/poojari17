#include <stdio.h>


int main()
{
	int t,i;
	scanf("%d",&t);
	while(t--)
	{
		int a,b,n;
		scanf("%d%d%d",&n,&a,&b);
		int p[300]={0},q[300]={0};
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
			for(i=0;i<n;i++)
			{
			    int w,x,y,z,v;
				w=s[i][0];
				x=s[i][2];
				y=s[i][3];
				z=s[i][5];
				v=s[i][4];	
			   if(x=='+' || x=='-')
			   {
			   		if(v=='\0' && p[y])
			   	  	{
			   	  		 if(!p[w ] && x=='-' )
			   	  	 	{	
			   	  	    	p[w ]=1;
			   	  	    	q[w ]=-q[y];
			   	  	    	flag=1;
			   	  	    	c++;
			   	  	    	break;
					 	}
					 	else if(!p[w ] && x=='+')
			   	  	 	{
			   	  	    	p[w ]=1;
			   	  	    	q[w ]=q[y];
			   	  	    	flag=1;
			   	  	    	c++;
			   	  	    	break;
					 	}
				  	}
				  	else
				  	{
				  		 if(!p[w ] && p[y] && p[z])
			   	  	 	{
			   	  	 		int t1,t2,t3;
			   	  	 		if(x=='-')
			   	  	 		  t1=-q[y];
			   	  	 		else
							  t1=q[y];	    
			   	  	 	    t2=q[z];
			   	  	    	p[w ]=1;
							if(v=='+')
							{
								t3=t1+t2;
							}
							else if(v=='-')
							{
								t3=t1-t2;
							}	
							else
							{
								t3=t1*t2;
							}
							q[w ]=t3;
							flag=1;
							c++;
					 	}
						
					 		
					  }
				}
				else  if(y && x>='a' && x<='z')
				{				
					if(!p[w ] && p[x] && p[v])
					{
						p[w ]=1;
						int t1,t2,t3;
			   	  	 		
						    t1=q[x];	    
			   	  	 	    t2=q[v];
			   	  	    	p[w ]=1;
							if(y=='+')
							{
								t3=t1+t2;
							}
							else if(y=='-')
							{
								t3=t1-t2;
							}	
							else
							{
								t3=t1*t2;
							}
							q[w ]=t3;
						flag=1;
						c++;
				   		break;
					}
			   }
			   else if(!y)
			   {
			   	    if(!p[w ] && p[x]){	 
			   	  	p[w ]=1;
			   	  	q[w ]=q[x];
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