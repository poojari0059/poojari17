#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

char s[1000005];
int isVowel(char p)
{
 char c = tolower(p);
 if(c=='a' || c=='e' || c=='i' || c=='o' || c=='u')
return 1;
else
return 0;
}
int casel(char c)
{
	if(isupper(c))
	return 1;
	else
	return 2;
}
int main()
{
  int t;
 scanf("%d", &t);
while(t--)
{
   scanf("%s", s);
   long long int v =0, sum = 0, i;
   
  for(i=0 ; i< strlen(s);i++)
{
       if(i!=0 && i!=(strlen(s)-1))
     {
        if(isVowel(s[i]))
       {
          if(isVowel(s[i-1]) && isVowel(s[i+1]) && casel(s[i-1])==casel(s[i+1]) )
          v++;
       }
     }
     if(isdigit(s[i]))
     {
     	long long int p =0;
     	while(isdigit(s[i]))
     	{
     		p= p*10 + (s[i]-'0');
     		i++;
     	}
     	sum+= p;
     	i--;
     }
     //printf("%d\n", i);
}
long long int ans = sum>0 ? v%sum:v;
printf("%lld\n",ans);
}
return 0;
}