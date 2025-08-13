#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
int T,i,j,r,V=0,SUM=0;
string S;
scanf("%d",T);
for(i=0;i<T;i++){
gets(S);
for(j=1;j<strlen(S);j++){
if(isdigit(s[j])){
sum+=int(s[j]);}
else if(s[j]=='a' || s[j]=='e' || s[j]=='i' || s[j]=='o' || s[j]=='u'){
if(s[j+1]=='a' || s[j+1]=='e' || s[j+1]=='i' || s[j+1]=='o' || s[j+1]=='u'){
if(s[j-1]=='a' || s[j-1]=='e' || s[j-1]=='i' || s[j-1]=='o' || s[j-1]=='u'){
V+=1;}}}
else if(s[j]=='A' || s[j]=='E' || s[j]=='I' || s[j]=='O' || s[j]=='U'){
if(s[j+1]=='A' || s[j+1]=='E' || s[j+1]=='I' || s[j+1]=='O' || s[j+1]=='U'){
if(s[j-1]=='A' || s[j-1]=='E' || s[j-1]=='I' || s[j-1]=='O' || s[j-1]=='U'){
V+=1;}}}
}
if(isdigit(S[0])){
sum+=int(s[0]);}
r=V%SUM;
printf("%d",r);
}
return 0;
}