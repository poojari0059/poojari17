#include <stdio.h>


int length(char c[100])
{
    
    int i;
    for(i=0;c[i]!='\0';i++);
    
    return i;
}
int main() {

    
    char num1[100],num2[100];
    long long res[100000];
    long long int n1[10000],n2[10000],i,j,k,l,m,t,v,ans,top,flag,bas,id1,id2,len1,len2,carry;
    
    scanf("%lld",&t);
    
    
    while(t--)
        {flag=1;
         
        scanf("%lld",&bas);
        scanf("%s",num1);
        scanf("%s",num2);
         len1=length(num1);
         len2=length(num2);
         top=0;
         carry=0; 
         for(i=0;i<len1;i++)n1[i]=num1[i]-'0';
         for(i=0;i<len2;i++)n2[i]=num2[i]-'0';
         
         for(i=0;i<len1;i++){if(num1[i]>='A' && num1[i]<='Z' )n1[i]=(num1[i]-'A'+10);}
         for(i=0;i<len2;i++){if(num2[i]>='A' && num2[i]<='Z' )n2[i]=(num2[i]-'A'+10);}
         for(i=0;i<len1 && i< len2;i++)
            {
            id1=(len1-i-1);
            id2=(len2-i-1);
            if((n1[id1]) >= bas || (n2[id2])>=bas){flag=0; break;}
            else {
                ans=(n1[id1] + n2[id2] +carry);
                res[top++]=(ans%bas);
                carry=ans/bas;
            }
        }
         if(flag && i==len2)
         for(;i<len1;i++){
              id1=(len1-i-1);
                ans=(n1[id1] + carry);
                res[top++]=(ans%bas);
                carry=ans/bas;
         }
         
         if(flag && i==len1)
             {
           for(;i<len2;i++){
              id2=(len2-i-1);
                ans=(n2[id2] + carry);
                res[top++]=(ans%bas);
                carry=ans/bas;
                         }    
            }
         
         if(carry) res[top++]=carry;
         
         if(flag)
             for(i=top-1;i>=0;i--){
             if(res[i]<10)
             printf("%lld",res[i]);
            else printf("%c",'A'+res[i]-10);
         }  
             else
             printf("NA");
             
             
             printf("\n");
    }
    return 0;
}
