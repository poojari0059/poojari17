#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


void fn(int arr[], int n,int hor[])
{
   int i, key, j,keyh;
   for (i = 1; i < n; i++)
   {
       keyh=hor[i];
       key = arr[i];
       j = i-1;
 
       while (j >= 0 && arr[j] < key)
       {
           hor[j+1]=hor[j];
           arr[j+1] = arr[j];
           j = j-1;
       }
       arr[j+1] = key;
       hor[j+1]=keyh;
   }
    
    
}
 

int main() {

    int m,n,i,j,t;
    int v,h;
    
    int cost;
    int a[1000];
    int hor[1000];
    scanf("%d",&t);
    
    while(t--){
        j=0;
        v=0;
        h=0;
        
        scanf("%d %d",&m,&n);
        
        for(i=0;i<m-1;i++){
            scanf("%d",&a[j]);
            hor[j]=1;
            j++;
        }
        
        for(i=0;i<n-1;i++){
            scanf("%d",&a[j]);
            hor[j]=0;
            j++;
        }
        
       fn(a,j,hor);
        cost=0;
        for(i=0;i<j;i++){
            if(hor[i]==1){
                cost=((cost+(a[i]*(v+1))));
                h++;
            }
            else if(hor[i]==0){
                cost=((cost+(a[i]*(h+1))));
                v++;
            }
            
        }
        
        printf("%d\n",cost);
    }
    
    
    
    
    return 0;
}
