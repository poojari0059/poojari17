#include <stdio.h>


 int mul(int a,int b){
 	int sum=0;
 	while(a){
 		sum+=b;
 		a-=1;
	 }
	 return sum;
 }

int mod_fun(int a, int b)
{
	int rem;
	rem=a-mul((a/b),b);
	return rem;
}
int no_of_circle(int m, int n)

{
	if(!n)
	return 0;
	int mod;
	mod = mod_fun(n,m);
	if(mod)
	return (n/m)+1;

	return n/m;
}
int last_tree(int x, int n)
{
	if(!n)
	return 0;

	int freq=1, curr_tree=0;
while(n)
{
	int j=0;
	while((!(j/x)) && n)
	{
		int i=0;
		while((!(i/freq)) && n)
		{
			i=i+1;
			n=n-1;
		//	printf("%d\n",curr_tree);
		}
		if(n!=0)
		curr_tree= mod_fun(curr_tree+1,x);
		j=j+1;
	}
	freq=freq+1;
}
return (curr_tree+1);
}

int main()
{
int t;
scanf("%d",&t);
while(t)
{
	t=t-1;
int x,m,n;
     scanf("%d %d %d",&x,&m,&n);
     printf("%d %d\n", last_tree(x,n), no_of_circle(m,n));
   }
}