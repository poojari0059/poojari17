#include <stdio.h>


int P=-100000;
int cal(int a,int b,int c)
{
    if(a==P||b==P) return P;
    int R;
    switch (c){
       case 12 : R=a+b;
                 break;       
       case 13 : R=a-b;
                 break;
       case 14 : R=a*b;
                 break;    
    }
   
    return R;  
}
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        int x[27]={0},y[27]={0},o[27]={0},V[27]={0},O[27];
        char S[10];
        int n,a,b,i,j;
        int u,v,w;
        for(i=1;i<=26;i++)
          O[i]=P;
        scanf("%d%d%d",&n,&a,&b);
        
        int F=0;
         if(a<-10||a>10) F=1;
         if(b<-10||b>10) F=1;
         
        O[1]=a;
        O[2]=b;
        for(i=0;i<n;i++){
                     scanf("%s",S); 
                     
                     for(j=0;S[j]!='\0';++j);
                     u=S[0]-'a'+1;
                     
                     if(j==3)
                     { 
                        V[u]=3;
                        v=S[2]-'a'+1;
                        x[u]=v;
                     }
                     else if(j==5)
                     {
                     v=S[2]-'a'+1;
                     w=S[4]-'a'+1;
                     V[u]=5;
                     x[u]=v;
                     y[u]=w;
                    if(S[3]=='+')
                       o[u]=12;
                    if(S[3]=='-')
                       o[u]=13;
                    if(S[3]=='*')
                       o[u]=14;
                    }
                    
                    else if(j==4){
                      V[u]=4;
                        v=S[3]-'a'+1;
                        x[u]=v;
                        
                    }
                    else if (j==6){
                    
                     v=S[3]-'a'+1;
                     w=S[5]-'a'+1;
                     V[u]=6;
                     x[u]=v;
                     y[u]=w;
                    if(S[4]=='+')
                       o[u]=12;
                    if(S[4]=='-')
                       o[u]=13;
                    if(S[4]=='*')
                       o[u]=14;
                    }
        }     
         v=0;
         w=0;
       for(i=3;i<=26;i++){
                          
         for(j=3;j<=26;j++){
             
             if(V[j]==5&&O[j]==P){
                  v=x[j]; 
                  w=y[j];
                  O[j]=cal(O[v],O[w],o[j]);
             }
             else if(V[j]==3&&O[j]==P){
                  v=x[j];
                  if(O[v]!=P)
                    O[j]=O[v];     
             }
             else if(V[j]==6&&O[j]==P){
                  v=x[j]; 
                  w=y[j];
                  O[j]=cal(-O[v],O[w],o[j]);
             }
             else if(V[j]==4&&O[j]==P){
                  v=x[j];
                  if(O[v]!=P)
                    O[j]=-O[v];     
             }
         }       
       }
       for(i=1;i<=26;i++)
          if((V[i]==3||V[i]==4||V[i]==5||V[i]==6)&&O[i]==P)
             F=1;
        if(F) printf("NA");
        else{
        for(i=1;i<=26;i++)
          if(V[i]==3||V[i]==4||V[i]==5||V[i]==6)
            printf("%d ",O[i]);
        }
        printf("\n");
    }
    return 0;    
}
