#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int powi ( int n,int j)
    {
        int res=1,i;
    
    for(i=0;i<j;i++)res*=n;
    
    
    return res;
}
short vowel(char ch)
    {
    if (ch == 'a' || ch == 'A' || ch == 'e' || ch == 'E' || ch == 'i' || ch == 'I' || ch =='o' || ch=='O' || ch == 'u'|| ch == 'U')
        return 1;
    return 0;
}

int samecase(char a,char b)
    {
    if(((a>='a'&&a<='z')&&(b>='a'&&b<='z'))||((a>='A'&&a<='Z')&&(b>='A'&&b<='Z')))
         return 1;
    return 0;
        
}
int main() {
  int t,n;
  scanf("%d",&t);
   while(t--)
       {
       char s[100000];
       int i;
       scanf("%s",s);
       int res=0,count=0;
       for(i=0;(s[i]!='\0');i++);
       n=i;
       for(i=n-1;i>=0;i--)
           {
           if(s[i]>='0'&&s[i]<='9')
               {
               res+=(s[i]-'0')*powi(10,count);
               count++;
               
           }
           else
               count=0;
       }
     
       int c=0;
       for(i=1;(s[i+1]!='\0');i++)
           {
           if(vowel(s[i]) && vowel(s[i+1]) && vowel(s[i-1]) && samecase(s[i],s[i-1]) && samecase(s[i],s[i+1]))
               c++;
           
       }
       printf("%d\n",c%res);
   }
}
