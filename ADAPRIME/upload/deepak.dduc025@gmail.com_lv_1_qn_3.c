#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>


// Function to calculate sum of all numbers present
// in a string containing alphanumeric characters
long int findSum(char str[])
{
    // A temporary string
    char temp[1000000] = "";
    char ch;
    // holds sum of all numbers present in the string
    long int sum = 0,i,k=0;

    // read each charcater in input string
    for (i=0;str[i]!='\0';i++)
    {   ch=str[i];

        // if current character is a digit
        if (isdigit(ch))
            temp[k++]=ch;

        // if current character is an alphabet
        else
        {
            // increment sum by number found earlier
            // (if any)
            temp[k]='\0';
            sum += atoi(temp);

            // reset temporary string to empty
            temp[0] = '\0';
            k=0;
        }
    }
    temp[k]='\0';
    // atoi(temp.c_str()) takes care of trailing
    // numbers
    return sum + atoi(temp);
}
long int countVowel(char str[]){

    long int sum = 0,i;
    char c;
    int isLowercaseVowel, isUppercaseVowel;
    for (i=1;str[i+1]!='\0';i++){
        c=str[i];
        isLowercaseVowel = (c == 'a' || c == 'e' || c == 'i' || c == 'o' || c == 'u');
    // evaluates to 1 (true) if c is an uppercase vowel
        isUppercaseVowel = (c == 'A' || c == 'E' || c == 'I' || c == 'O' || c == 'U');

        if (isUppercaseVowel ){
            if((str[i-1] == 'A' || str[i-1] == 'E' || str[i-1] == 'I' || str[i-1] == 'O' || str[i-1] == 'U') && (str[i+1] == 'A' || str[i+1] == 'E' || str[i+1] == 'I' || str[i+1] == 'O' || str[i+1] == 'U'))
                sum++;
        }else if(isLowercaseVowel){
            if((str[i-1] == 'a' || str[i-1] == 'e' || str[i-1] == 'i' || str[i-1] == 'o' || str[i-1] == 'u') && (str[i+1] == 'a' || str[i+1] == 'e' || str[i+1] == 'i' || str[i+1] == 'o' || str[i+1] == 'u'))
                sum++;
        }
    }
    return sum;
}
// Driver code
int main()
{
    // input alphanumeric string
    int t,V,d;
    long int sum;
    char str[1000000];
    scanf("%d",&t);
    scanf("%c",&d);
    while(t--){
        gets(str);
        V = countVowel(str);
        sum = findSum(str);
       // printf("%ld",V);
        //printf("%ld",sum);
        printf("%ld\n",V%sum);
    }


    return 0;
}