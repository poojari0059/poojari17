#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int isnumber(char j)
{
	
	if(j=='0'||j=='1'||j=='2'||j=='3'||j=='4'||j=='5'||j=='6'||j=='7'||j=='8'||j=='9')
    return 1;
    else 
    return 0;
   
}
int isvowel(char pre,char c,char next)
{
		if((c=='a'||c=='e'||c=='i'||c=='o'||c=='u')&&(pre=='a'||pre=='e'||pre=='i'||pre=='o'||pre=='u')&&(next=='a'||next=='e'||next=='i'||next=='o'||next=='u'))
		      return 1;
	
	     if((c=='A'||c=='E'||c=='I'||c=='O'||c=='U')&&(pre=='A'||pre=='E'||pre=='I'||pre=='O'||pre=='U')&&(next=='A'||next=='E'||next=='I'||next=='O'||next=='U'))
			      return 1;
		
		         
	          return 0;
}
int main()
{
	int n;
	scanf("%d",&n);
	while(n--)
	{
	char s[1000001];
	scanf("%s",s);
	unsigned long long int j=1,sum=0,v=0,t=0;
	while(j<(strlen(s))-1)
	{
		
		if(isvowel(s[j-1],s[j],s[j+1]))
		{
		    ++v;
		    j++;
        }
        else
        ++j;
    }
    j=0;
    while(j<strlen(s))
    {
	
    	if(isnumber(s[j]))
		{
			t=0;
			while(isnumber(s[j]))
			{
				t=t*10+(s[j++]-'0');
			}
			sum+=t;
		}
		else
		++j;
	} 
	printf("%lu\n",(v%sum));

}
return 0;
}