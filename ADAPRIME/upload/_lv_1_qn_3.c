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
           char s[1000000],ch;
           unsigned long int temp,m=0,i,liv,riv,iv,j,k,l,v=0;
           scanf("%s",s);
           i=0;
           while(s[i])
           {
               iv=s[i];
              if(iv==97||iv==101||iv==105||iv==111||iv==117)
              {
                   liv=(i==0)?123:s[i-1];
                   riv=(s[i+1]=='\0')?123:s[i+1];
                  if((liv==97||liv==101||liv==105||liv==111||liv==117)&&(riv==97||riv==101||riv==105||riv==111||riv==117))v++;
                   i++;
              }
               else if(iv==65||iv==69||iv==73||iv==79||iv==85)
                 {
                    liv=(i==0)?123:s[i-1];
                    riv= (s[i+1]=='\0')?123:s[i+1];
                   if((liv==65||liv==69||liv==73||liv==79||liv==85)&&(riv==65||riv==69||riv==73||riv==79||riv==85))
                    v++;
                    i++;
                 }
                else if(iv<=57&&iv>=48)
                {
                  temp=0;
                  while(s[i]&&iv<=57&&iv>=48)
                  {
                       temp=temp*10+(iv-48);
                       i++;
                       iv=s[i];
                  }
                  m+=temp;
                }
                else i++;
           }
           printf("%d\n",m);
           if(v==0||m==0)printf("0\n");
           else printf("%d\n",v%m);
      }
      return 0;
}