#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
              
       int angle,n;
       double a,b,temp,speed,time;
       scanf("%d%d%lf%lf",&n,&angle,&time,&speed);
       n--;
       int i;
       double arr[n];
       for(i=0;i<n;i++)
        scanf("%lf",&arr[i]);
        
       a=sin(angle* (3.14/180.0) ) ;          
       b=sin(angle*2*(3.14/180.0) ); 
      // printf("%lf %lf\n",a,b);
       int count=0;
       temp=(double)(arr[0]/(speed*a));
       double min=temp;     
      // printf("min %lf\n",min);
    if(n<=3){
    int k=0;
    for(i=1;i<n;i++)
     if(arr[k]>=arr[i]){
        k=i;
    }printf("%d\n",k+1);
    
    }else{
       for(i=0;i<n;i++){
                      
             temp=temp= ((double)arr[i]/(speed*a));
           //  printf("temo %lf min %lf\n",temp,min);
       
             //temp=floor(abs(temp));
             if(temp<=time&&temp<=min){
                 min=temp;              
                 count=i+1;                        
                 }
       }      
      printf("%d\n",count);   
}
    }
 
    return 0;
    
}
