#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int t,m,n;
int x[100],y[100];

int ans=0;

void calc (int m1,int m2, int n1, int n2)
{	
	if (m2-m1==1&&n2-n1==1)  return;
	
	else
	{
		int largest=x[m1+1]; int axis=1; int pos=m1+1;
		
		for (int i=m1+2; i<=m2-1;i++)
			if (x[i]>largest) { largest=x[i]; pos=i; }	
			
		for (int i=n1+1; i<=n2-1;i++)
			if (y[i]>largest)  { largest=y[i];	axis=2; pos=i; }
			
		ans+=largest;
		
		if (axis==1)
		{
			calc(m1,pos,n1,n2); 
			calc(pos,m2,n1,n2);
		}
			
		else
		{
			calc(m1,m2,n1,pos); 
			calc(m1,m2,pos,n2);
		}
		
		
	}
	
}


int main ()
{



scanf("%d",&t);

while (t>0)
{

scanf("%d",&m);
scanf("%d",&n);

for (int i=1; i<=m-1; i++)
	scanf("%d",&x[i]);
	
for (int i=1; i<=n-1; i++)
	scanf("%d",&y[i]);
	
	
calc (0,m,0,n);

printf("%d",ans);

t--;


}

return 0;

}