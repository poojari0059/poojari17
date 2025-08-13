#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int n,t;
char c[20];
char str[100][100];
int sz=0;
char ans[1000];
struct snode{
	char data[100];
	int top;
}S;
void init()
{
	S.top = -1;
}
void push(char q)
{
	S.top++;
	S.data[S.top]=q;
}
int find(char path[])
{
	int i;
	for(i=0;i<sz;i++)
	{
		if(!strcmp(path,str[i]))
		return 1;
	}
	return 0;
}
char pop()
{
	char temp=S.data[S.top];
	S.top--;
	return temp;
}
int isEmpty()
{
	if(S.top==-1)
	return 1;
	else
	return 0;
}
	void digui(int pos,char path[],int curp)
	{
		int m,i;
		if(pos<n)
		{
			push(c[pos]);
			digui(pos+1,path,curp);
			pop();
		}
		if(!isEmpty())
		{
			m=pop();
			path[curp]=m;
			curp++;
			digui(pos,path,curp);
			push(m);
		}
		if(pos==n && isEmpty())
		{
			path[curp]='\0';
			if(!find(path))
			{
				strcpy(str[sz],path);
				sz++;
				int q=0;
				while(path[q]=='0')
				q++;
				if(q==strlen(path))
				strcat(ans,"0\n");
				else
				{
				 strcat(ans,path+q);
				 strcat(ans,"\n");}
			} 
			
			
		}
		
		
	}
	int main()
	{
		char path[100];
		scanf("%d",&t);
		while(t--)
		{
		sz=0;
		scanf("%s",c);
		ans[0]='\0';
		n=strlen(c);
		init();
		digui(0,path,0);
		int m= strlen(ans),i;
		for(i=0;i<m;i++)
		{
			while(ans[i]!='\n')
			{
			 printf("%c",ans[i]);
			 i++;}
			 if(!(t==0 && i==m-1))
			 printf("\n");
		}
	}
	    
		return 0;
	}