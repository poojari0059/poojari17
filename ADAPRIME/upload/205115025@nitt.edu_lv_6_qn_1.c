#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int compare(const void *a, const void * b)
{
    return ( *(char *)b - *(char *)a );
}
 

void swap(char* a, char* b)
{
    char t = *a;
    *a = *b;
    *b = t;
}
 

int findCeil(char str[], char first, int l, int h)
{

    int ceilIndex = l,i;

    for ( i = l+1; i <= h; i++)
        if (str[i] < first && str[i] > str[ceilIndex])
            ceilIndex = i;
 
    return ceilIndex;
}

void sortedPermutations(char str[])
{
    
    int size = strlen(str);
 
    
    qsort(str, size, sizeof( str[0] ), compare);
 
   
    int isFinished = 0;
    while (!isFinished)
    {
       
        static int x = 1;
        printf("%s \n",str);
 
        
        int i;
        for (i = size - 2; i >= 0; --i)
            if (str[i] > str[i+1])
                break;
 
        if (i == -1)
            isFinished = 1;
        else
        {
            
            int ceilIndex = findCeil(str, str[i], i + 1, size - 1);
 
            
            swap(&str[i], &str[ceilIndex]);
 
            
            qsort(str + i + 1, size - i - 1, sizeof(str[0]), compare);
        }
    }
}
 

int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
    char str[100];
    scanf("%s",str);
    sortedPermutations( str );
    }
    return 0;
}