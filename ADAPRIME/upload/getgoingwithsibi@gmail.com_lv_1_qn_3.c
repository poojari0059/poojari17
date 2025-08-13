#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(void)
{
long long int totalnumbers;
long long int sumofvowels=0,sumofnumbers=0;
long long int number,end=23;
long long int  answer;long long int i,iterand,j ;
char cha='\n',aha='\n',bha='\n';
char string[]="aeiouAEIOU";
scanf("%lld",&totalnumbers);
scanf("%c",&cha);
for(i=0;i<totalnumbers;i++)
{answer=0;
  iterand=0;
sumofvowels=0;
    sumofnumbers=0;
if(cha=='\n')
cha='1';
aha='\n';
bha='\n';
number=0;
while(cha!='\n'&&end!=EOF)
{
iterand=0;
aha=bha;
bha=cha;
end=scanf("%c",&cha);
for(j=0;j<10;j++)
{
if(aha==string[j])
{if(j<5)
iterand+=2;
else
    iterand+=5;}
if(bha==string[j])
{if(j<5)
iterand+=2;
else
    iterand+=5;}
if(cha==string[j])
{
    if(j<5)
iterand+=2;
else
    iterand+=5;}
}
if(iterand==6||iterand==15)
sumofvowels++;
if(cha>=48&&cha<=58&&end!=EOF)
{number*=10;number+=cha-48;}
else
{sumofnumbers+=number;number=0;}
}
sumofnumbers+=number;number=0;
answer=0;
if(sumofnumbers!=0)
answer=sumofvowels%sumofnumbers;
 printf("%d\n",(int)answer);
}
return 0 ;
}