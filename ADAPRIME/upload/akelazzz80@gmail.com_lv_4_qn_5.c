#include <stdio.h>



Len(char a[100])
{
	int i=0;
	for(i=0;a[i];i++);
	return i;
}
int flag,t,n,m,i,len[100],i,j,k,l,o,p,x,y,temp;
char a[100][100];
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d%d",&n,&m);
		for(i=0;i<n;i++)
	    {
	    	scanf("%s",a[i]);
	    	len[i]=Len(a[i]);
		}
		
	}
	return 0;
}