#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


int checkSmall(char ch)
{
    if(ch=='a'||ch=='e'||ch=='i'||ch=='o'||ch=='u')
        return 1;
    return 0;
}
int checkCaps(char ch)
{
    if(ch=='A'||ch=='E'||ch=='I'||ch=='O'||ch=='U')
        return 1;
    return 0;
}
int main()
{
    int t=0,i=0,j=0,v=0;
 long int sum=0,num=0;
    char s[1000000];
    scanf("%d",&t);
    for(i=0;i<t;i++)
    {
        scanf("%s",s);
        for(j=0;j<strlen(s);j++)
        {
            if(checkSmall(s[j]))
            {
                if(checkSmall(s[j-1])&&checkSmall(s[j+1]))
                {
                    v++;
                }
                if(num!=0)
                {
                sum+=num;
                num=0;

                }
                sum+=num;
                num=0;
            }
            else if(checkCaps(s[j]))
            {
                if(checkCaps(s[j-1])&&checkCaps(s[j+1]))
                {
                    v++;
                }

                if(num!=0)
                {
                sum+=num;
                num=0;

                }
            }
            else if(s[j]<='9'&&s[j]>='0')
            {
                num=num*10+s[j]-48;
            }

            else if(num!=0)
            {
                sum+=num;
                num=0;

            }
        }
sum+=num;
        printf("%d\n",v%sum);
        sum=num=v=0;


    }


    return 0;
}
