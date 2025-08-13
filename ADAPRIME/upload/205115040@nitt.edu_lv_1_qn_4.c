#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int a[1001], b[1001];


int find (const void *a, const void *b) {
    return *(int *)b - *(int *)a;
}

int main() {
  
    int m,n,t;
    long long int i, j;
    scanf("%d", &t);
    while(t--)
    {
	
        scanf("%d%d", &m, &n);
        for (i=0; i<m-1; i++)
		 scanf("%d", &a[i]);
        for (i=0; i<n-1; i++) 
		 scanf("%d", &b[i]);
        qsort(a, m-1, sizeof(a[0]), find);
        qsort(b, n-1, sizeof(b[0]), find);
        long long int sum = 0;
        for (i=0,j=0; i<m-1&&j<n-1;) 
		{
            if (a[i] > b[j])
			   sum = (sum+(j+1)*a[i++])%1000000007;
            else
			   sum = (sum+(i+1)*b[j++])%1000000007;
        }
        for (; i<m-1; i++) 
		  sum = (sum+n*a[i])%1000000007;
        for (; j<n-1; j++) 
		  sum = (sum+m*b[j])%1000000007;
        printf("%lld\n", sum);
    }
    return 0;
}
