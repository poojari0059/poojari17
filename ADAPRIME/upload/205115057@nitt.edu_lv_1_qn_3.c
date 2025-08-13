#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int count(char *c,int len){
	printf("%d\n",len);
	int num=0,sum=0,flag,i,count=0;
	for(i=0;i<len;){
		  flag=1;
		  num=0;
		 if(c[i]=='-'&&c[i+1]>47&&c[i+1]<58&&i<len){
		 	i++;
		 	 flag=-1;
		 }
		 
		while((c[i]>47&&c[i]<58)&&(i<len)){
			  num=num*10+(c[i]-48);
			  i++;
			  printf("i%d\n",i);
		  }
		  printf("%d\n",num);
		  sum+=flag*num;
		if(i>0&&i<len-1&&(c[i]>64&&c[i]<91)||(c[i]>96&&c[i]<123)){
			if((c[i]=='a'||c[i]=='e'||c[i]=='i'||c[i]=='o'||c[i]=='u')&&(c[i+1]=='a'||c[i+1]=='e'||c[i+1]=='i'||c[i+1]=='o'||c[i+1]=='u')&&(c[i-1]=='a'||c[i-1]=='e'||c[i-1]=='i'||c[i-1]=='o'||c[i-1]=='u')){
			 count++;
			 i++;	
			}
			
			else if((c[i]=='A'||c[i]=='E'||c[i]=='I'||c[i]=='O'||c[i]=='U')&&(c[i+1]=='A'||c[i+1]=='E'||c[i+1]=='I'||c[i+1]=='O'||c[i+1]=='U')&&(c[i-1]=='A'||c[i-1]=='E'||c[i-1]=='I'||c[i-1]=='O'||c[i-1]=='U')){
			 	count++;
				 i++;	
			}
		
		  // continue;
		}
		if(!((c[i]>64&&c[i]<91)||(c[i]>96&&c[i]<123)||(47<c[i]<58)||(c[i]=='-')))
		 i++;
	}
	return count%sum;
	
	
}
int main(){
	
	int n;
	scanf("%d",&n);
	while(n){
		char ch[1000000];
		scanf("%s",ch);
		int len=strlen(ch);
		printf("%d\n",count(ch,len));
	}
	return 0;

}

