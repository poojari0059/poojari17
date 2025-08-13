#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
int n, sum, v,k, i, j;
char input[10000];
scanf("%d", &n);
for( i=0;i<n;i++) {
for(k=0; k<10000; k++)
input[10000] = '\0';
sum=0;
v=0;
scanf("%s", input);

if (isdigit(input[0]))
sum += input[0];
for( j=1; j<strlen(input)-1; j++)
{
if (isdigit(input[j]))
sum += input[j];
if(input[j]=='a'||input[j]=='e'||input[j]=='i'||input[j]=='o'||input[j]=='u')
{
if(input[j-1]=='a'||input[j-1]=='e'||input[j-1]=='i'||input[j-1]=='o'||input[j-1]=='u')
{
if(input[j+1]=='a'||input[j+1]=='e'||input[j+1]=='i'||input[j+1]=='o'||input[j+1]=='u')
{
v++;
}}}
if(input[j]=='A'||input[j]=='E'||input[j]=='I'||input[j]=='O'||input[j]=='U')
{
if(input[j-1]=='a'||input[j-1]=='e'||input[j-1]=='i'||input[j-1]=='o'||input[j-1]=='u')
{
if(input[j+1]=='a'||input[j+1]=='e'||input[j+1]=='i'||input[j+1]=='o'||input[j+1]=='u')
{
v++;
}}}
}
printf("%d\n", v%sum);
}
return 0;
}



