#include <stdio.h>

int p=1,m[1<<9],a[1<<9],t,n,i,j;

int su(int x, int y)
{
    if (!y)
        return x;
    return su(x ^ y, (~x & y) << p);
}
int ad(int x, int y)
{
    if (!y)
        return x;
    else
        return ad( x ^ y, (x & y) << p);
}
int mu(int x, int y)
{
   if(!y)
     return 0;

     return (ad(x, mu(x, su(y,p))));
}
int lo(int i)
{
	i=su(i,p);
a:  if(m[i])
	{
		i=su(i,p);
		goto a;
	}
	return i;
	
}
int hi(int i)
{
    i=ad(i,p);
b:  if(m[i])
	{
		i=ad(i,p);
		goto b;
	}
	return i;
}
int main()
{
	scanf("%d",&t);
c:	if(t)
	{
		scanf("%d",&n);
		i=p;
	d: if(i<=n)
	{
		scanf("%d",&a[i]);
		 m[i]= 0;
		 i= ad(i,p);
		 goto d;
	}
		a[0]=p;
		a[ad(n,p)]=p;
		a[ad(n,2)]=p<<9;
		int c=0,f=p,l=n,s=c;
	e:	if(c<su(n,p<<1))
		{
			int mn=ad(n,p<<1);
			i=p;
		f:  if(i<=n)
			{
				if(!m[i] && i!=f && i!=l)
				{
				if(a[i]==a[mn])
				{
					if(ad(a[lo(i)],a[hi(i)])>ad(a[lo(mn)],a[hi(mn)]))
					mn=i;
				}
				if(a[i]<a[mn])
				mn = i;
			   }
			   i= ad(i,p);
			   goto f;
			}
			if(a[f]<=a[mn] && (a[f]==p || !a[f]) && !m[f])
			{
				if(a[f] && a[f]==a[mn])
				{
					if(ad(a[lo(f)],a[hi(f)])>ad(a[lo(mn)],a[hi(mn)]))
					mn=f;
				}
				else
				mn=f;
			}
			if(a[l]<=a[mn] && (a[l]==p || !a[l]) && !m[l])
			{
				if(a[l] && a[l]==a[mn])
				{
					if(ad(a[lo(l)],a[hi(l)])>ad(a[lo(mn)],a[hi(mn)]))
					mn=l;
				}
				else
				mn=l;
			}
            s=ad(s,mu(a[mn],mu(a[lo(mn)],a[hi(mn)])));
			m[mn]=p;
			if(mn==f)
			f=hi(mn);
			if(mn==l)
			l=lo(mn);
			c=ad(c,p);
			goto e;
		}
		int i=p;
		if(a[f]>a[l])
		s=ad(s,ad(mu(a[f],a[l]),a[f]));
		else
		s=ad(s,ad(mu(a[f],a[l]),a[l]));
		if(n==p)
		s=a[f];
		i=p;
		
	g:	if(mu(i,i)<=s)
	{
	  
		i=ad(i,p);
		goto g;
	}
		printf("%d\n",su(i,p));
		t=su(t,p);
		goto c;
	}
	return 0;
}