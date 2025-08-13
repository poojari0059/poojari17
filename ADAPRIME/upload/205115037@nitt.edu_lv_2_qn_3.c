#include <stdio.h>

int getNumeralValue(char );
char getNumeral(int );
int sum(char a,char b,int base,int *nml1,int *nml2,int *res_nml,int *carry){
	 *nml1 = getNumeralValue(a);
     *nml2 = getNumeralValue(b);
     if(*nml1>base ||*nml2>base ||*nml1== -1 || *nml2== -1)
     return -1;
     *res_nml = *carry + *nml1 + *nml2;
     if(*res_nml >= base){
       *carry = 1;
      * res_nml -= base;}   
     else
       *carry = 0;            
     return 0;}
char *sumBase(char *num1,  char *num2,char *res,int base,int l1,int l2){
   int i,nml1, nml2, res_nml,k,j=51,carry = 0;
   for(i = l1-1,k=l2-1; k >= 0 && i>=0; --k,--i){
	 int z=sum(num1[i],num2[k],base,&nml1,&nml2,&res_nml,&carry);
	 if(z!=0)
	 return -1;      
     res[j--] = getNumeral(res_nml);}
       while(k>=0){
	  int z=sum('0',num2[k--],base,&nml1,&nml2,&res_nml,&carry);
	 if(z!=0)
	 return -1;      
     res[j--] = getNumeral(res_nml);}
	   while(i>=0){
	  int z=sum(num1[i--],'0',base,&nml1,&nml2,&res_nml,&carry);
	 if(z!=0)
	 return -1;      
     res[j--] = getNumeral(res_nml);}
   if(carry == 0)
     return (j + 1);   
 
   res[j] = '1';
   return j;}
int getNumeralValue(char num){
  if( num >= '0' && num <= '9')
    return (num - '0');
   else if( num >= 'A' && num <= 'J')  
    return (num - 'A' + 10);}
char getNumeral(int val){
  if( val >= 0 && val <= 9)
    return (val + '0');
   if( val >= 10 && val <= 20)  
    return (val + 'A' - 10);}
int main(){
	int t;
	scanf("%d",&t);
	while(t--){
    char num1[51],num2[51],res[52] ;
    int base,l1,l2,i=0,count=0,fla=0,j=0;
    scanf("%d%s%s",&base,&num1,&num2);
    while(num1[i++]!='\0')
    count++;
    l1=count; i=count=0;
    while(num2[i++]!='\0')
    count++; l2=count;
     j=sumBase(num1,num2,res,base,l1,l2);
     if(j==-1)
     printf("NA\n");
     else{
     while(res[j]<'1' && j<51 )
         ++j;     
    	while(j<=51) 
    	printf("%c",res[j++]);
        printf("\n"); }
}
    return 0;
}