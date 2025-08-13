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
unsigned long long int h,l;
scanf("%llu%llu",&h,&l);
if(h==0||l==0||l%2==1)
printf("-1\n");
else
{
if(l/2==h)
printf("%llu\n",h);
else
if(l/4==h)
printf("0\n");
else
{
unsigned long long int hn=h/2;
unsigned long long int cw=h-hn;
while(hn>0&&cw>0)
{
if((hn*2+cw*4)==l)
{

printf("%llu\n",hn);
break;
}
else
{
if((hn*2+cw*4)>l)
{
hn++;
cw--;
}
else
{
hn--;
cw++;
}
}
}
if(hn==0||cw==0)
{
	printf("-1\n");
}
}
}
}
return 0;
}