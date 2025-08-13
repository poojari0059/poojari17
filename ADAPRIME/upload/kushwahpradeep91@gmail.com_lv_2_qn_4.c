#include <stdio.h>

char s[50][10];
int getsize(char str[])
{
	int i=0;
	while(str[i]!='\0')
	{
		i++;
	}
	return i;
}
int find(char ch,int n,int arr[])
{
	int i,j;
	for(i=0;i<n;i++)
	{
		if(s[i][0]==ch)
		{
			return i;
			break;
		}
	}
	return -1;
}

void calculate(int n,int arr[])
{
   	   int i,j,t,len,c=0;
   	   char ch='c',var1,var2,var3;
   	   for(i=2;i<26;i++)
   	   {
   	   	    for(j=2;j<26;j++)
   	   	    {

   	   	    int k=find(ch,n,arr);
   	   	   if(k!=-1)
   	   	{
		
   	   	   len=getsize(s[k]);
   	   	   if(len>4)
   	   	   {
		   	   	if(len==5)
		   	   	{
   	   	   			 var1=s[k][2];
   	   	   	         var2=s[k][4];
   	   	   		    if(s[k][3]=='+')
					{
					//	printf("p\n");
						t=(arr[var1-97]+arr[var2-97]);
						arr[ch-97]=t;
					}
					else if(s[k][3]=='-')
					{
						t=(arr[var1-97]-arr[var2-97]);
						arr[ch-97]=t;
					}
					else 
					{
						t=(arr[var1-97]*arr[var2-97]);
						arr[ch-97]=t;
					}	
		      	 }
		   	   	    	else if(len==6)
		   	   	   	{
		   	   	   	    var3=s[k][2];
		   	   	   	        if(var3=='-')
		   	   	   	        {
									 
					   	   	   	    var1=s[k][3];
					   	   	   	    var2=s[k][5];
					   	   	   	    if(s[k][4]=='+')
					   	   	   	    {
					   	   	   	    	t=((-1*(arr[var1-97]))+arr[var2-97]);
					   	   	   	    	arr[ch-97]=t;
							    	 }
							    	  if(s[k][4]=='-')
					   	   	   	    {
					   	   	   	    	t=((-1*(arr[var1-97]))-arr[var2-97]);
					   	   	   	    	arr[ch-97]=t;
							    	 }
							    	   if(s[k][4]=='*')
					   	   	   	    {
					   	   	   	    	t=((-1*(arr[var1-97]))*arr[var2-97]);
					   	   	   	    	arr[ch-97]=t;
							    	 }	
							}
							else{
											var1=s[k][2];
										 	var2=s[k][5];
										 	if(s[k][3]=='+')
							   	   	   	    {
							   	   	   	    	t=((arr[var1-97])+(-1*arr[var2-97]));
							   	   	   	    	arr[ch-97]=t;
									    	 }
									    	  if(s[k][3]=='-')
							   	   	   	    {
							   	   	   	    		t=((arr[var1-97])-(-1*arr[var2-97]));
							   	   	   	    	arr[ch-97]=t;
									    	 }
									    	   if(s[k][3]=='*')
							   	   	   	    {
							   	   	   	    	t=((arr[var1-97])*(-1*arr[var2-97]));
							   	   	   	    	arr[ch-97]=t;
									    	 }			
													
													
								
						     	}
						  		 
					 }
						 else if(len==7)
						 {
						 //	printf("d");
						    var1=s[k][3];
			   	   	   	    var2=s[k][6];
			   	   	   	    int t1=arr[var1-97];
			   	   	   	    int t2=arr[var2-97];
							t=((-1*t1)*(-1*t2));
							arr[ch-97]=t;		 	
						 }
				 }
				 else
				 {
				 	
				 	if(len==4)
				 	{
				 		var1=s[k][3];
				 		arr[ch-97]=(-1*arr[var1-97]);
					 }
					 else
					 {
					 //	printf("s");
					 	var1=s[k][2];
				 		arr[ch-97]=(arr[var1-97]);
					 }	
				  }		 
				 
		    }
		    ch++;
		}
	}	
	for(i=2;i<26;i++)
	{
		if(arr[i]>=-9999999&&arr[i]<=9999999)
		c++;
	}
	if(c==n)
	{
		for(i=2;i<26;i++)
		{
			if(arr[i]>=-9999999&&arr[i]<=9999999)
			printf("%d ",arr[i]);
			
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
	
		int arr[26];
		for(i=0;i<26;i++)
		arr[i]=99999999;
		arr[0]=a;
		arr[1]=b;
		for(i=0;i<n;i++)
		{
			scanf("%s",&s[i]);
		} 
	    calculate(n,arr);
		printf("\n");
		
	}
return 0;
}