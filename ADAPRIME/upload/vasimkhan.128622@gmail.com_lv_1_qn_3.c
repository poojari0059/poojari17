#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int islower(char c)
{
       if(c=='a'||c=='e'||c=='i'||c=='o'||c=='u')
          return 1;
       return 0;     
}

int isupper(char c)
{
       if(c=='A'||c=='E'||c=='I'||c=='O'||c=='U')
          return 1;
       return 0;     
}

int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
         char str[1000001];
         long long int sum=0,i,l,v=0,digit;
         scanf("%s",str);
         for(i = 0; str[i] != '\0'; ++i);       
         l=i;
         
            i=0;
            while(str[i])
            {
            digit =0;
            while(str[i]>='0' && str[i]<='9' &&str[i])
            {
            digit=digit*10+(str[i]-'0');
            i++;
            }
            if(digit>0)
            {
            sum+=digit;
            }
            i++;
            }
            
         for(i=1;i<l-1;i++){
               if( islower(str[i]) && islower(str[i-1]) && islower(str[i+1]) )
                            v++;         
               if( isupper(str[i]) && isupper(str[i-1]) && isupper(str[i+1]) )
                            v++;  
          }
    
         if(v==0||sum==0)
            v=0;
            else
            v=v%sum;
         printf("%lld\n",v);
         
         
    }
    
    return 0;
}
