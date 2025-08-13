#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main(){
	int t,size1,totalv,i,sum1,j;
	long long int total=0;
	scanf("%d",&t);
	
	fflush(stdin);
	
	while(t--){
		
		totalv=total=0;
		char ch[1000001];
		
		scanf("%s",ch);
		size1=strlen(ch);
	//	printf("%s   %d",ch,size1);
		for(i=0;i<size1;i++){
			
			if(i==0 || i==size1-1);
				else {
			
				if( ch[i]=='a' || ch[i]=='e' || ch[i]=='i' || ch[i]=='o'|| ch[i]=='u'){
			         if(( ch[i-1]=='a' || ch[i-1]=='e' || ch[i-1]=='i' || ch[i-1]=='o'|| ch[i-1]=='u')&&( ch[i+1]=='a' || ch[i+1]=='e' || ch[i+1]=='i' || ch[i+1]=='o'|| ch[i+1]=='u'))
						totalv++;
					}
					//	printf("\n%c  %c  %c\n",ch[i-1],ch[i],ch[i+1]);
					else if(ch[i]=='A'|| ch[i]=='E'|| ch[i]=='I'|| ch[i]=='O'|| ch[i]=='U'){
						if(( ch[i-1]=='A'|| ch[i-1]=='E'|| ch[i-1]=='I'|| ch[i-1]=='O'|| ch[i-1]=='U') &&( ch[i+1]=='A'|| ch[i+1]=='E'|| ch[i+1]=='I'|| ch[i+1]=='O'|| ch[i+1]=='U'))
						  totalv++;
					} 
				//printf("\nIn else %d   charcter = %c  \n",i,ch[i]);
			
			}
			//printf("\nIn outside %d   charcter = %c \n",i,ch[i]);
		}
	//	printf("%d",count);
	//count=sum(ch);
	
	
	for(i=0;i<size1;){
		if(ch[i]>='0' && ch[i]<='9'){
			sum1=ch[i]-48;
			//	printf("Value of i =%d\n",i);
				j=i+1;
			while( j<size1 && (ch[j]>='0' && ch[j]<='9') ){
				
				sum1=sum1*10+ch[j]-48;
				j++;
				//printf("Value of sum  =%d\n",sum1);
				
			}
		//	printf("\nValue of i =%d and value of j =%d\n",i,j);
		//	printf("\nValue of prod =%ul",prod);
			total+=sum1;
		//	printf("\nValue of total =%ul",total);
			i=j;
			
		}else i++;
	}
	
	
		if(total!= 0)
			printf("%d\n",totalv%total);
		else
			printf("0\n");
	}
	
	return 0;
}