#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int max(int a,int b)
{
	return a>b?a:b;
}

 long long int What_A_Max(long long int arr[],long long  int n)
{
  long long int INC = arr[0];
 long long  int EX = 0;
 long long  int EX_new;
long long   int i;
 
  for (i = 1; i < n; i++)
  {
    
     EX_new = (INC > EX)? INC: EX;
     INC = EX + arr[i];
     EX = EX_new;
  }
   return ((INC > EX)? INC : EX);
}
int X1,Y1,p,q,X2,Y2,IX1,IY1;
float s,r,U,Manu,Agra,x,y;

void Manu_Ag()
{
      U=sqrt(pow(X2-IX1,2)+pow(Y2-IY1,2));   // calculate length between two end points
	  Manu=sqrt(pow(IX1-X1,2)+pow(IY1-Y1,2));
	  Agra=sqrt(pow(X2-X1,2)+pow(Y2-Y1,2));
	  x=(X1*U+X2*Manu+IX1*Agra)/(U+Manu+Agra);    /// incenter formula for x point
	  y=(Y1*U+Y2*Manu+IY1*Agra)/(U+Manu+Agra);   /// incenter formula for x point
	  
	  if((x==X1&&y==Y1)  ||        (x==X2&&y==Y2)  || (x==IX1&&y==IY1))   // checking for boundry 
	    printf("NA\n");
	  else
	  {
		 p=floor(x); q=floor(y);
	     printf("%d %d\n",p,q);
     }	
}

int ZigZag(int n)
{
	int sum=0;
	while(n>0)
	{
		if(n%2)
		sum+=1;
		n=n/2;
	}
	return sum;
}
int maxSum(int arr[], int n)
{

	int i,Manu = 0;
	for ( i=0; i<n; i++)
		Manu += arr[i];
	int Manu1 = 0;
	for (i=0; i<n; i++)
		Manu1 += i*arr[i];
	int res = Manu1;
	for (i=1; i<n; i++)
	{
	int next_val = Manu1 - (Manu - arr[i-1])
					+ arr[i-1] * (n-1);
	Manu1 = next_val;
	res = max(res, next_val);
	}

	return res;
}
 int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
	 
	  scanf("%d%d%d%d%d%d",&X1,&Y1,&X2,&Y2,&IX1,&IY1);	  
	  Manu_Ag(); 
    }
}