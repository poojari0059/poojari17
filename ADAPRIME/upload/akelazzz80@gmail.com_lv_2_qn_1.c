#include <stdio.h>


const int maxi=100000;
struct  node
{
    long long  f; // the 'first' element ('A_i')
    long long  s; // the 'second' element ('B_i')
};
  struct node a[10000];
long long diff;
int n,t;
int cmp(struct node a, struct node b)
{

    return(a.f+a.s>b.f+b.s);
}
void sort(struct node a[], int n, int (*cmp)(struct node,struct node))
{
	int i=0,j;
	struct node temp;
	for(i=1;i<n;++i)
	{
		for(j=0;j<(n-1);++j)
		if(!cmp(a[j],a[j+1]))
		{
			temp = a[j];
			a[j]=a[j+1];
			a[j+1]=temp;
		}
	}
}
void solve()
{
    diff=0;
    int i=0;
    sort(a,n,cmp);
    for ( i=0;i<n;i++)
     if (i%2==0) diff+=a[i].f; else diff-=a[i].s;
        if (diff>0) printf("KOGA\n"); else
 if (diff==0) printf("TIE\n"); else
            printf("RYUHO\n");
}
int main()
{
     scanf("%d",&t);
    int i=0;
    while (t--)
    {
    scanf("%d",&n);
    for (i=0;i<n;i++)
        scanf("%lld",&a[i].f);
    for (i=0;i<n;i++)
        scanf("%lld",&a[i].s);
        solve();
    }
    return 0;
}


