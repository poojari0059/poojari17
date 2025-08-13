#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

main()
{
char s[1000000];
int i,k,t;
long sum=0,n,count=0,temp;
scanf("%d",&t);
while(t>0)
{
count=0;sum=0;
fflush(stdin);
scanf("%s",&s);
n=strlen(s);
for(i=0;i<n;i++)
{
if(i!=0 && i!=n)
{
if(s[i]=='a' || s[i]=='e' || s[i]=='i' || s[i]=='o' || s[i]=='u')
{
if((s[i-1]=='a' || s[i-1]=='e' || s[i-1]=='i' || s[i-1]=='o' || s[i-1]=='u') && (s[i+1]=='a' || s[i+1]=='e' || s[i+1]=='i' || s[i+1]=='o' || s[i+1]=='u'))
++count;
}
else if(s[i]=='A' || s[i]=='E' || s[i]=='I' || s[i]=='O' || s[i]=='U')
{
if((s[i-1]=='A' || s[i-1]=='E' || s[i-1]=='I' || s[i-1]=='O' || s[i-1]=='U') && (s[i+1]=='A' || s[i+1]=='E' || s[i+1]=='I' || s[i+1]=='O' || s[i+1]=='U'))
++count;
}
}
if((s[i]-'0'>=0) && (s[i]-'0'<=9))
{
if(sum<=n)
{temp=0;
for(k=i;(s[k]-'0'>=0) && (s[k]-'0'<=9);k++)
{
temp=temp*10+(s[k]-'0');
}
i=k;
sum+=temp;
}
}
}
printf("%d",count%sum);
t--;
}
return 0;
}
