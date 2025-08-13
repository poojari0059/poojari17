#include <stdio.h>

int find_diff(int num1, int num2)
{
    if(num1 > num2)
        return num1 - num2;
    else
        return num2 - num1;
}

void balance(int sum2, int sum1, int a2[], int a1[], int n)
{
    int diff = (sum2 - sum1)/2;
    int min, bal = 999999;
    int idx1 , idx2, temp1, temp2;
    int i = 0; int j = 0;
    char FLAG = 'F';
    while(i < n && j < n)
    {
        min = a2[j] - a1[i];
        if (min > 0) 
        {
            if (min < diff * 2)
            {
                min = find_diff (min, diff);
                if (bal > min)
                {
                    bal = min;
                    idx1 = i;
                    idx2 = j;
                    i++;
                    FLAG = 'T';
                }
                else
                    j++;
            }
            else 
                j++;
        }
        else
            i++;
    }
    if (FLAG=='T')
    {
        temp1 = a1[idx1];
        temp2 = a2[idx2];
        for (i = idx1; i >= 0; i--)
        {
            if(temp2 > a1[i - 1])
                a1[i] = a1[i - 1];
            else
            {
                a1[i] = temp2;
                break;
            }

        }
        for (i = idx2; i < n; i++)
        {
            if(temp1 < a2[i + 1])
                a2[i] = a2[i + 1];
            else
            {
                a2[i] = temp1;
                break;
            }
        }

        sum1 = sum1 - temp1 + temp2;
        sum2 = sum2 - temp2 + temp1;

        if (sum2 > sum1)
           balance(sum2, sum1, a2, a1, n);
        else
           balance(sum1, sum2, a1, a2, n);
    }
    else
    {
    	if(sum1<sum2)
        printf("%d\n",sum1);
        else
        printf("%d\n",sum2);
    }
}

void divided(int a[], int n)
{
    int a1[n/2], a2[n/2];
    int sum1 = 0;
    int sum2 = 0; 
    int k = 0;
    int i;


    a1[0] = a[n-1];
    a2[0] = a[n-2];

    for (i = n-2; i >= 2; i-=2)
    {
        sum1 += a1[k];
        sum2 += a2[k];
        k += 1;
        if (sum1 > sum2)
        {
            a1[k] = a[i - 2];
            a2[k] = a[i - 1];
        }
        else
        {
            a1[k] = a[i - 1];
            a2[k] = a[i - 2];
        }
    }

    sum1 += a1[k];
    sum2 += a2[k];

    if (sum2 > sum1)
       balance(sum2, sum1, a2, a1, k+1);
    else
       balance(sum1, sum2, a1, a2, k+1);
}
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int n,i;
		scanf("%d",&n);
		int a[n];
		for(i=0;i<n;i++)
		scanf("%d",&a[i]);
		divided(a,n);
		
    }
    return 0;
}