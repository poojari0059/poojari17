#include <stdio.h>



int cal(int a,int b,int c)
{
    if(a==11||b==11) return 11;
    int res=11;
    switch (c){
       case 12 : res=a+b;
                 break;       
       case 13 : res=a-b;
                 break;
       case 14 : res=a*b;
                 break;    
    }
    if(res<-10||res>10) return 11;
    return res;  
}
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        int x[27]={0},y[27]={0},o[27]={0},va[27]={0},op[27];
        char str[10];
        int n,a,b,i,j;
        int u,v,w;
        for(i=1;i<=26;i++)
          op[i]=11;
        scanf("%d%d%d",&n,&a,&b);
        
        op[1]=a;
        op[2]=b;
        for(i=0;i<n;i++){
         scanf("%s",str); 
         u=str[0]-'a'+1;
         v=str[2]-'a'+1;
         w=str[4]-'a'+1;
         
         va[u]=1;
         x[u]=v;
         y[u]=w;
        
        if(str[3]=='+')
           o[u]=12;
        if(str[3]=='-')
           o[u]=13;
        if(str[3]=='*')
           o[u]=14;
        
        }     
        
        /*  
        for(i=1;i<=26;i++)
         printf("%d %d %d %d %d %d\n",i,va[i],x[i],y[i],o[i],op[i]); 
         */
         v=0;
         w=0;
       for(i=3;i<=26;i++){
                          
         for(j=3;j<=26;j++){
             if(va[j]==1&&op[j]==11){
                  v=x[j]; 
                  w=y[j];
                  op[j]=cal(op[v],op[w],o[j]);
             }
         }       
       }
       int flag=0;
       for(i=1;i<=26;i++)
          if(va[i]==1&&op[i]==11)
             flag=1;
        if(flag) printf("NA");
        else{
        for(i=1;i<=26;i++)
          if(va[i]==1)
            printf("%d ",op[i]);
        }
        printf("\n");
    }
    
    return 0;    
    
}