#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

 long long  t,arr[1000],n,i;

long long  find(long long  arr[], long long  n,long long  k)
{
  long long  incl = arr[0];
  long long  excl = 0;
  long long  n_excl;
  long long  i;
   long long  flag=0;
  for (i = 1; i < n-1; i++)
  {
     
     if(incl>excl)
     {
     
		n_excl=incl;    
     	
	 }
	 else
	 {
	 	n_excl=excl;
	 }
	 
     incl = excl + arr[i];
     excl = n_excl;
  }
 
  
   return ((incl > excl)? incl : excl);
}
int findn(int i,int n,int a,int sum)
{
	if(i>=n)
	  return sum;
	if(a==1&&i==(n-1))
	{
		return sum;
	}
	if(i==0)
	 a=1;
	int k=findn(i+2,n,a,sum+arr[i]);
	if(i==0)
	a=0;
	int l=findn(i+1,n,a,sum);
	return k>l?k:l;
}

long long  find1(long long  arr[], long long  n,long long  k)
{
  long long  incl = arr[1];
  long long  excl = 0;
  long long  n_excl;
  long long  i;
   long long  flag=0;
  for (i = 2; i < n; i++)
  {
   
     if(incl>excl)
     {
     
		n_excl=incl;    
     	
	 }
	 else
	 {
	 	n_excl=excl;
	 }
	 
     incl = excl + arr[i];
     excl = n_excl;
  }
 
   
   return ((incl > excl)? incl : excl);
}
 
int main()
{
  
  scanf("%lld",&t);
  while(t--)
  {
  	long long  a=0;
  	scanf("%lld",&n);
  	for(i=0;i<n;i++)
  	  scanf("%lld",&arr[i]);
  	if(n<=10)
	  {
	  	printf("%d\n",findn(0, n,a,0));
	  	
	  }
	else
	{
		   
  	long long int sum1=  find(arr, n,0);
  	long long int sum2=  find1(arr, n,1);
  
    printf("%lld \n", sum1>sum2?sum1:sum2);
    }
  }

  
  return 0;
}