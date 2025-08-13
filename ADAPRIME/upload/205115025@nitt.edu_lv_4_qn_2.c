#include <stdio.h>

int max(int a, int b)
{
	if(a>b)
	return a;
	else
	return b;
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int s=0,s2=0,x=0,m=0,i=0,j=0,g=0,mul=0,n=0;
		
		scanf("%d",&n);
		int f[1001]={0};
		s=0;
		for(i=0;i<n;++i)
		{
			scanf("%d",&x);
			s+=x;
			f[x]++;
		}
		s2 = (s/2);
		int v[s2+1];
		for(i=0;i<s2+1;i++)
		v[i]=0;
		
		
		v[0]=1;
		m=0;
		for(i=1;i<=1000;++i)
		{
			for(j=m;j>=0;--j)
			{
				mul=i;
				for(g=1;g<=f[i] && j+mul<=s2; ++g)
				{
					v[j]?v[j+mul]=v[j]:0;
					m=max(m,mul+j);
					mul+=i;
				}
			}
		}
		
		for(i=s2;!v[i];--i);
		int ans = max(i,s-i);
		printf("%d\n",ans);				
	}
	return 0;
}