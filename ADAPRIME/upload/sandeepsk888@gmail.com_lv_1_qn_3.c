#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int main()
{
    int t;
    scanf("%d",&t);
    if(t>=1 && t<=100)
    {
        char s[1000000];
        long int m=0,c=0;
        int i=0,j=0,f=0,k;
        while(t--)
        {
            scanf("%s",&s);
            m=c=0;
            j=k=0;
            for(i=0;s[i]!=0;i++)
                j++;
            for(i=1;i<(j-1);i++)
            {
                if(s[i]=='a'|| s[i]=='e' || s[i]=='i' || s[i]=='o'|| s[i]=='u')
                {
                    if((s[i-1]>=97 && s[i-1]<=122) && (s[i+1]>=97 && s[i+1]<=122) &&(s[i-1]=='a'|| s[i-1]=='e' || s[i-1]=='i' || s[i-1]=='o'|| s[i-1]=='u') && (s[i+1]=='a'|| s[i+1]=='e' || s[i+1]=='i' || s[i+1]=='o'|| s[i+1]=='u'))
                        c++;
                }
                else if(s[i]=='A'|| s[i]=='E' || s[i]=='I' || s[i]=='O'|| s[i]=='U')
                {
                     if((s[i-1]>=65 && s[i-1]<=90) && (s[i+1]>=65 && s[i+1]<=90) &&(s[i-1]=='A'|| s[i-1]=='E' || s[i-1]=='I' || s[i-1]=='O'|| s[i-1]=='U') && (s[i+1]=='A'|| s[i+1]=='E' || s[i+1]=='I' || s[i+1]=='O'|| s[i+1]=='U'))
                        c++;
                }
            }
            for(i=0;i<j;i++)
               {

               if(s[i]>=48 && s[i]<=57)
                {
                    if(k>0)
                    m = (m*10) + (s[i]-48);
                    else
                        m=m+(s[i]-48);
                    k=1;
                }
                else
                    k=0;
               }


            if(c==0 || m==0)
                printf("%li\n",c);
            else
            printf("%li\n",(c%m));
        }
    }
    return 0;
}
