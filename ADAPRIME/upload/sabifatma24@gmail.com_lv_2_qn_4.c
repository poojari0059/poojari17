#include <stdio.h>

int r[26],f;
int strl(char str[]){
	int i;
	for(i=0;str[i];i++)
		;
	return i;
}
void strc(char s[],char *d){
	int i=0;
	for(;d[i];i++)
		s[i] = d[i];
}
int c(char sr[256][7],char s[]){
	int sign = 1,i;
	char c1,c2;
	int a;
	if(sr[s[0]-'a'][0]=='a')
		return r[0];
	if(sr[s[0]-'a'][0]=='b')
		return r[1];
	if(strl(s)==0){
		f = -1;
		return 0;
	}
	if(s[2]=='-' || s[2]=='+'){
		if(s[2]=='-')
			sign = -1;	
		a = (r[s[3]-'a']==99999999?c(sr,sr[s[3]-'a']):r[s[3]-'a']);	
		if(s[4]=='+')
			return (r[s[0]-'a'] = sign*a + (r[s[5]-'a']==99999999?c(sr,sr[s[5]-'a']):r[s[5]-'a']));
		else if(s[4]=='-')
			return (r[s[0]-'a'] = sign*a - (r[s[5]-'a']==99999999?c(sr,sr[s[5]-'a']):r[s[5]-'a']));
		else if(s[4]=='*')
			return (r[s[0]-'a'] = sign*a * (r[s[5]-'a']==99999999?c(sr,sr[s[5]-'a']):r[s[5]-'a']));
		else
			return (r[s[0]-'a'] = sign*a);	
	}
	else{
		a = (r[s[2]-'a']==99999999?c(sr,sr[s[2]-'a']):r[s[2]-'a']);	
		if(s[3]=='+')
			return (r[s[0]-'a'] = a + (r[s[4]-'a']==99999999?c(sr,sr[s[4]-'a']):r[s[4]-'a']));
		else if(s[3]=='-')
			return (r[s[0]-'a'] = a - (r[s[4]-'a']==99999999?c(sr,sr[s[4]-'a']):r[s[4]-'a']));
		else if(s[3]=='*')
			return (r[s[0]-'a'] = a * (r[s[4]-'a']==99999999?c(sr,sr[s[4]-'a']):r[s[4]-'a']));
		else
			return (r[s[0]-'a'] = a);	
	}	
}
int main(){
	int t;
	scanf("%d",&t);
	while(t--){
		int n,a,b,i;
		char s[256][7]={0};
		f = 0;
		scanf("%d %d %d",&n,&a,&b);
		for(i=0;i<26;i++)
			r[i] = 99999999;
		r[0] = a;
		r[1] = b;
		strc(s[0],"a=");
		strc(s[1],"b=");
		for(i=0;i<n;i++){
			char t[6];
			scanf("%s",t);
			strc(s[t[0]-'a'],t);
		}
		for(i=2;i<26;i++){
			if(strl(s[i]))
				c(s,s[i]);
		}
		if(f==-1)
			printf("NA");
		else
		for(i=2;i<26;i++)
			if(r[i]!=99999999){
				printf("%d ",r[i]);
			}
		
		printf("\n");
	}
	return 0;
}