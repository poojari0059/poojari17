#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

void main()
{
int t;
scanf("%d",&t);
while(t--)
{
char str[1000002];
scanf("%s",str);
long long i=0,count1=0,count2=0,l=strlen(str);
for(i=0;i<l;i++)
{
if(i!=0&&i!=l-1){
if(str[i]=='a'||str[i]=='A'||str[i]=='e'||str[i]=='E'||str[i]=='i'||str[i]=='I'||str[i]=='o'||str[i]=='O'||str[i]=='u'||str[i]=='U')
if(str[i-1]=='a'||str[i-1]=='A'||str[i-1]=='e'||str[i-1]=='E'||str[i-1]=='i'||str[i-1]=='I'||str[i-1]=='o'||str[i-1]=='O'||str[i-1]=='u'||str[i-1]=='U')		if(str[i+1]=='a'||str[i+1]=='A'||str[i+1]=='e'||str[i+1]=='E'||str[i+1]=='i'||str[i+1]=='I'||str[i+1]=='o'||str[i+1]=='O'||str[i+1]=='u'||str[i+1]=='U')
count1++;
printf("%d   ",i);}
if(str[i]>=47&&str[i]<=57)
count2+=str[i]-'0';
}
printf("%d\n",count1%count2);
}
}