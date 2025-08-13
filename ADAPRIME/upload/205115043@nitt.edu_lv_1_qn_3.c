#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int isLowercaseVowel(char c){
	int y = (c == 'a' || c == 'e' || c == 'i' || c == 'o' || c == 'u');
	if(y == 1)
		return 1;
	return 0;
}
int isUppercaseVowel(char c){
	int y = (c == 'A' || c == 'E' || c == 'I' || c == 'O' || c == 'U');
	if(y == 1)
		return 1;
	return 0;
}
int main(void){
	long long int T, V, sum, i,len;
	int j , k;
	char S[1000001];
	scanf("%lld", &T);
	fflush(stdin);
	while(T--){
		scanf("%s", S);
		len = strlen(S);
		i = 0;
		V = 0;
		sum = 0;
		while(S[i] != '\0'){
			if(i==0   ||  i == len-1){
				if((int)S[i] >= 48 && (int)S[i] <= 57)
				sum += (int)S[i] - '0';	
			}
			else{
					j = isLowercaseVowel(S[i]);
			k = isUppercaseVowel(S[i]);
			if(j == 1){
					if( isLowercaseVowel(S[i - 1]) && isLowercaseVowel(S[i + 1]))
						V++;
				}
			else if(k == 1){
					if( isUppercaseVowel(S[i - 1]) && isUppercaseVowel(S[i + 1]))
						V++;
				}
			else if((int)S[i] >= 48 && (int)S[i] <= 57){
				sum += (int)S[i] - '0';
				}
		}
			i += 1;
		}
				printf("%d\n",V % sum);		
	}
}