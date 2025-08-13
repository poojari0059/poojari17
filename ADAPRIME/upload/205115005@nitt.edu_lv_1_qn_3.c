#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
long long int sum, count;
int i, len, t; 

char *str;
scanf("%d",&t);
while(t--){
str = (char *)malloc(sizeof(char)*1000005);
//fgets(str, 1000005, stdin);
scanf("%s",str);
i = 0;
sum = 0;
count = 0;
len = strlen(str);
while(str[i] != '\0'){
if(str[i] >= 48 && str[i] <= 57)
sum += str[i] - 48;
if(i > 0 && i < len-1 && (str[i] == 'a' || str[i] == 'e' || str[i] == 'i' || str[i] == 'o' || str[i] == 'u' )){
if((str[i-1] == 'a' || str[i-1] == 'e' || str[i-1] == 'i' || str[i-1] == 'o' || str[i-1] == 'u') && (str[i+1] == 'a' || str[i+1] == 'e' || str[i+1] == 'i' || str[i+1] == 'o' || str[i+1] == 'u' ))
count++;
}
if(i > 0 && i < len-1 && (str[i] == 'A' || str[i] == 'E' || str[i] == 'I' || str[i] == 'O' || str[i] == 'U' )){
if((str[i-1] == 'A' || str[i-1] == 'E' || str[i-1] == 'I' || str[i-1] == 'O' || str[i-1] == 'U') && (str[i+1] == 'A' || str[i+1] == 'E' || str[i+1] == 'I' || str[i+1] == 'O' || str[i+1] == 'U' ))
count++;
}
i++;
}
//if(sum == 0 || count==0)
//printf("0\n");
//else
printf("%lld\n",count%sum);
}
return 0;
}