#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



 
/* Meta program that generates set bit count
   array of first 256 integers */
 
/* GROUP_A - When combined with META_LOOK_UP
   generates count for 4x4 elements */
 
xxxx GROUP_A(x) x, x + 1, x + 1, x + 2
 
/* GROUP_B - When combined with META_LOOK_UP
   generates count for 4x4x4 elements */
 
xxxx GROUP_B(x) GROUP_A(x), GROUP_A(x+1), GROUP_A(x+1), GROUP_A(x+2)
 
/* GROUP_C - When combined with META_LOOK_UP
   generates count for 4x4x4x4 elements */
 
xxxx GROUP_C(x) GROUP_B(x), GROUP_B(x+1), GROUP_B(x+1), GROUP_B(x+2)
 
/* Provide appropriate letter to generate the table */
 
xxxx META_LOOK_UP(PARAMETER) \
   GROUP_xxxxPARAMETER(0),  \
   GROUP_xxxxPARAMETER(1),  \
   GROUP_xxxxPARAMETER(1),  \
   GROUP_xxxxPARAMETER(2)   \
 
int countSetBits(int array[], size_t array_size)
{
   int count = 0;
 
   /* META_LOOK_UP(C) - generates a table of 256 integers whose
      sequence will be number of bits in i-th position
      where 0 <= i < 256
   */
 
    /* A static table will be much faster to access */
       static unsigned char const look_up[] = { META_LOOK_UP(C) };
 
    /* No shifting funda (for better readability) */
    unsigned char *pData = NULL;
   size_t index = 0;
   for(; index < array_size; index++)
   {
      /* It is fine, bypass the type xx */
      pData = (unsigned char *)&array[index];
 
      /* Count set bits in individual bytes */
      count += look_up[pData[0]];
      count += look_up[pData[1]];
      count += look_up[pData[2]];
      count += look_up[pData[3]];
   }
 
   return count;
}
 
/* Driver program, generates table of random 64 K numbers */
int main()
{
	int test_case;
	scanf("%d",&test_case);
	
	while(test_case--){
   int index;
   int SIZE;
   scanf("%d",&SIZE);
   int random[SIZE];
 
   /* Seed to the random-number generator */
   //srand((unsigned)time(0));
 
   /* Generate random numbers. */
   for( index = 0; index < SIZE; index++ )
   {
      scanf("%d",&random[index]);
   }
 
   printf("%d\n", countSetBits(random, SIZE));
}
   return 0;
}
