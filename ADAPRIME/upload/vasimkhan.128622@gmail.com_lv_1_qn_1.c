#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
 
unsigned long long  t,h,l,ans;
scanf("%lld",&t);
while(t--){
     scanf("%lld%lld",&h,&l);
     
     if(l%2||h>=l||(l/2<h)||h<=0||l<=0||l>1000000000000000000||h>1000000000000000000)
      {
                           
      ans=-1;
               
      }
      else
      {
       l=l/2;
     l=l-h;
     if(l>h)
      ans=-1;
      else
      {
         h=h-l;
         ans=h;
     }
     }
     printf("%lld\n",ans);
}

return 0;
}
