#include <stdio.h>


int m(int x , int y)
{
   
   if(! y )
     return 0 ;
 

   if( max( y , 0 ) )
     return ( x + m ( x , y - 1)) ;
  
  
   if( ! max( y , 0 ))
     return - m ( x ,  - y ) ;
}
int max(int x , int y)
{
  return x - (( x - y ) & (( x - y ) >> ( 31 )));
}

int main()
{
	int i , j , index , t , max1 , n , arr[4000] , brr[4000] , swap ;
	scanf("%d" , & t);
	
	while(t)
	{
		scanf("%d" , & n);
		int i = 0 ;
		
		while(i - n - n)
		{
			scanf("%d" , & arr[i]);
			brr[i] = i + 1 ;
			 
			i = i + 1 ;
		}
		i = 0 ;
			while(i - n - n)
		{
			
			arr[i] = m(arr[i] , i + 1 ); 
			i = i + 1 ;
		}
		i = n + n - 1 ;
        while (i)
		{     
             index = 0 ;                
               j = 0 ;
               while (max(j , i)- j || !(i - j))
			   {                    
                  if(!(arr[i] - arr[index])||(max(arr[j] , arr[index])- arr[index]))         
                    index = j ;
                  j = j + 1 ;
               }
       
           swap = arr[index];
          arr[index] = arr[i];
          arr[i] = swap ;
          swap = brr[index] ;
          brr[index] = brr[i] ;
          brr[i] = swap ; 
          i = i - 1 ; 
	   }
	max1 = n + n ;
	i = 0 ;
	while(i - n - n)
	{
		if(!(arr[i] - arr[n])&&(max(max1 , brr[i])- brr[i]))
		{
			max1 = brr[i] ;
			
		}
		i = i + 1 ;
	}

	printf("%d\n", max1) ;
	t = t - 1 ;
   }
   return 0 ;
}