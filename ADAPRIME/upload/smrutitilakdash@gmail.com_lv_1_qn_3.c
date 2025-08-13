#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int f(int i,char c[])
    {
    int j=i;
    if( (c[i] == 'a') ||(c[i] == 'e') ||(c[i] == 'i') ||(c[i] == 'o') ||(c[i] == 'u')  )
        {
        i=i+1;
        if( (c[i] == 'a') ||(c[i] == 'e') ||(c[i] == 'i') ||(c[i] == 'o') ||(c[i] == 'u')  )
        {
            i=i-2;
            if( (c[i] == 'a') ||(c[i] == 'e') ||(c[i] == 'i') ||(c[i] == 'o') ||(c[i] == 'u')  )
                return 1;
        }
        
    }
    
    
    else if( (c[j] == 'A') ||(c[j] == 'E') ||(c[j] == 'I') ||(c[j] == 'O') ||(c[j] == 'U')  )
        {
        j--;
         if( (c[j] == 'A') ||(c[j] == 'E') ||(c[j] == 'I') ||(c[j] == 'O') ||(c[j] == 'U')  )
             { j=j+2;
              if( (c[j] == 'A') ||(c[j] == 'E') ||(c[j] == 'I') ||(c[j] == 'O') ||(c[j] == 'U')  )return 1;
         }
    }
    
    return 0;
}

int main() {
    char c[2000009];
    long long int i,j,k,l,m,n,v,ans,t;
    
    scanf("%lld",&t);
    
    while(t--)
        {
        scanf("%s",c);
        
        v=0;
        ans=0;
        l=0;
        for(i=0;c[i]!='\0';i++)
            {
            m=c[i]-'0';
            if(m>=0 && m<=9)
                {l= ( l*10 + m);
            }
            
            else{
                ans=ans+l;
                l=0;
                
            }
            
            if(i && c[i+1]!='\0')
                {
                if(f(i,c))v++;
            }
            
            
        }
     
        if(l)ans=ans+l;
        
        printf("%lld \n",(v%ans));
        
    }
    
    
    return 0;
}
