#include <stdio.h>

int getsize(char a[])
{
	
	int i=0;
	while(a[i]!='\0')
	i++;
	return i;
}

int  basecheck(char s[],char a[],int b,int l)
{
	int i,j,count=0;
      for(i=0;i<l;i++)
      {
      	for(j=0;j<b;j++)
      	{
      		if(s[i]==a[j])
      		count++;
		  }
	  }
	 if(l==count)
	 return 1;
	 else
	 return 0;
}
void create_array(int b,char a[])
{
	int k=0,i;
	if(b!=0)
	{
	for( i=0;i<b;i++)
	{
		if(i<10)
		a[k++]=i+48;
		else{
			a[k++]=55+i;
		}
	}
	a[k]='\0';
   }
	else
	{
	a[0]='0';
	a[1]='\0';
   }

}

void addition(int b,char s1[],char s2[])
{    char res[52],c1,c2;
     int p;
     for(p=0;p<52;p++)
       res[p]='z';
    int t1,t2,T,temp,I,K;
    int carry=0,k;
	int l1,l2;
	l1=getsize(s1);
	l2=getsize(s2);
	int i=l1-1;
	int j=l2-1;
	k=i>j?i:j;
	k=k+1;
	I=l1<l2?l1:l2;
	K=k;
	while(I!=0)
	{
		 c1=s1[i];
		 c2=s2[j];
		if(c1>='A'&&c1<='Z')
		 t1=c1-65+10;
		else
		t1=c1-48;
		if(c2>='A'&&c2<='Z')
		 t2=c2-65+10;
		 else
		 t2=c2-48;
		 T=t1+t2+carry;
		 if(T>=b)
		 {
		    temp=T-b;
		   if(temp>9)
		   {
		   	res[k--]=55+temp;
			   }
			   else
			   {
			   res[k--]=48+temp;
		      }
			carry=1;   	
		 }
		 else{
		 		 if(T>9)
						   {
						   	res[k--]=55+T;
							   }
							   else
							   res[k--]=48+T;
						 	carry=0;		
		 }
		 
		 i--;
		 j--;
		 I--	;
	}
	i=i+1;
	j=j+1;
	   if(j!=0)
	   {         
	          I=j;
	          j=j-1;
					   	while(I!=0)
					   	{
						 c2=s2[j];
						if(c2>='A'&&c2<='Z')
						 t2=c2-65+10;
						 else
						 t2=c2-48;
						 T=t2+carry;
						 if(T>=b)
						 {
						    temp=T-b;
						   if(temp>9)
						   {
						   	res[k--]=55+temp;
							   }
							   else
							   res[k--]=48+temp;
							carry=1;   	
						 }
						 else{
						  if(T>9)
						   {
						   	res[k--]=55+T;
							   }
							   else
							   res[k--]=48+T;	
						 	carry=0;	
						 }
						 j--;
						 I--;
						   }
	   }
	   if(i!=0)
	   {        
	          I=i;
	          i=i-1;
	                 while(I!=0)
	                 {
					   	     c1=s1[i];
						if(c1>='A'&&c1<='Z')
						 t1=c1-65+10;
						else
							t1=c1-48;
						 T=t1+carry;
						 if(T>=b)
						 {
						    temp=T-b;
						   if(temp>9)
						   {
						   	res[k--]=55+temp;
							   }
							   else
							   res[k--]=48+temp;
							carry=1;   	
						 }
						 else{
						 	 if(T>9)
						   {
						   	res[k--]=55+T;
							   }
							   else
							   res[k--]=48+T;
						 	carry=0;	
						 }
						 i--;
						 I--;
						 
				}
						 
						 
	   }
	  i=0,j=0;
	   if(i==0&&j==0&&carry>0)
	   {
	   		res[k--]=48+carry;
	   }
	   res[++K]='\0';
	   int d,flag=0;
	   
	   for(i=0;i<K;i++)
	   {
	   	if(res[i]!='z'&&res[i]!='0')
	   	{
	   		d=i;
	   		break;
		   }
	   }
	   
	   for(i=d;i<K;i++)
	   {
	   	  if(res[i]!='z')
	   	  {
	   	  printf("%c",res[i]);
		  }
	   }
	   

	
}
void check(int b,char n1[],char n2[])
{
	char a[52];
    create_array(b,a);
	int l1=getsize(n1);
	int l2=getsize(n2);
	int ch1=basecheck(n1,a,b,l1);
	int ch2=basecheck(n2,a,b,l2);
	if(ch1==1&&ch2==1)
	{
	   addition(b,n1,n2);
	}
	else
	printf("NA");
	
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int b;
	     char n1[52],n2[52];
		scanf("%d%s%s",&b,n1,n2);
		check(b,n1,n2);
		printf("\n");
	}
	
	return 0;
}