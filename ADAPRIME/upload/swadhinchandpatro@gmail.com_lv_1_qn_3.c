#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(void) {
	int t,i,p=0,q=0;
	long int sum=0,v=0,a=0;
	char s[1000000];
	scanf("%d",&t);
	while(t--)
	{
	    scanf("%s",s);
	    sum=0;v=0;
	    for(i=0;i<strlen(s);)
	    {
	        if(s[i]-'0'<10 && s[i]-'0'>=0){
	        for(a=0;i<strlen(s) && s[i]-'0'<10&& s[i]-'0'>=0;i++)
	            a=a*10+(s[i]-'0');
	        sum+=a;
	        p=0;q=0;}
	        else if(s[i]=='a'||s[i]=='e'||s[i]=='i'||s[i]=='o'||s[i]=='u')
	        {
	            q=0;
	            p++;
	            if(p>=3)
	            v++;
	            i++;
	        }
	        else if(s[i]=='A'||s[i]=='E'||s[i]=='I'||s[i]=='O'||s[i]=='U')
	        {
	            p=0;
	            q++;
	            if(q>=3)
	            v++;
	            i++;
	        }
	        else
	        {p=0;q=0;i++;}
	    }
	    printf("%ld\n",v%sum);
	}
	return 0;
}