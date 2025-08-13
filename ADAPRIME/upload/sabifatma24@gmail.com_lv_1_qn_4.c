#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void isort(int arr[], int n)
{
   int i, key, j;
   for (i = 1; i < n; i++)
   {
       key = arr[i];
       j = i-1;
       while (j >= 0 && arr[j] > key)
       {
           arr[j+1] = arr[j];
           j = j-1;
       }
       arr[j+1] = key;
   }
}
void rev(int arr[], int n) {
	int i=0, j=n-1, temp;
	while (i < j) {
      temp = arr[i];
      arr[i] = arr[j];
      arr[j] = temp;
      i++;             // increment i
      j--;          // decrement j
   }
}
int fun(int X[], int Y[], int m, int n)
{
    int res = 0;
    isort(X, m);   ///sort 
    isort(Y, n);  ///sort
    rev(X, m);
    rev(Y, n);
    int hzntl = 1, vert = 1;
    int i = 0, j = 0;
    while (i < m && j < n)
    {
        if (X[i] > Y[j])
        {
            res += X[i] * vert;
 
            hzntl++;
            i++;
        }
        else
        {
            res += Y[j] * hzntl;
            vert++;
            j++;
        }
    }
    int total = 0;
    while (i < m)
        total += X[i++];
    res += total * vert;
    total = 0;
    while (j < n)
        total += Y[j++];
    res += total * hzntl;
    return res;
}
int main() {
	int t, m, n, h[105], v[105], i;
	scanf("%d",&t);
	while(t--) {
		scanf("%d %d",&m,&n);
		for(i=0;i<m-1;i++)
			scanf("%d",&h[i]);
		for(i=0;i<n-1;i++)
			scanf("%d",&v[i]);
		printf("%d\n",fun(h, v, m-1, n-1));
	} 
	return 0;
}