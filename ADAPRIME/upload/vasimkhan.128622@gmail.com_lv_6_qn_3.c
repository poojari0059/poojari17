#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int IN=999;
int N;
int cost[61][61];

int max(int n1,int n2,int n3)
{
    if( n1>=n2 && n1>=n3 )
        return n1;
    if( n2>=n1 && n2>=n3 )
        return n2;
    if( n3>=n1 && n3>=n2 )
        return n3;
    
}
char * st(char str[])
 {
    int i = 0,j=strlen(str)-1;
     int temp;
    while (i < j) {
      temp = str[i];
      str[i] = str[j];
      str[j] = temp;
      i++;
      j--;
 }
 return str;
      
}

int dijsktra(int source,int target)
{
    
    int dist[61]={0},prev[61]={0},selected[61]={0},i,m,min,start,d,j;
    char path[100];
    for(i=1;i<=N;i++)
    {
        dist[i] = IN;
        prev[i] = -1;
    }
    /*
    for(i=1;i<=N;i++){
          for(j=1;j<=N;j++)
            printf("%d   ",cost[i][j]);
         printf("\n");
         }
      */
    start = source;
    selected[start]=1;
    dist[start] = 0;
    while(selected[target] ==0)
    {
        min = IN;
        m = 0;
        for(i=1;i<=N;i++)
        {
            d = dist[start] +cost[start][i];
            if(d< dist[i]&&selected[i]==0)
            {  
                dist[i] = d;
                prev[i] = start;
            }
            if(min>dist[i] && selected[i]==0)
            {
                min = dist[i];
                m = i;
            }
        }
        start = m;
        selected[start] = 1;
    }
    start = target;
    j = 0;

    while(start != -1)
    {
        path[j++] = start+48;
        start = prev[start];
    }
    path[j]='\0';
    st(path);
    //printf("%s\n", path);
    
    int ans=dist[target];
    for(i=1;i<strlen(path);i++){
         cost[path[i]-48][path[i-1]-48]=cost[path[i-1]-48][path[i]-48]=IN;
     }
    
    return ans;
}
int main()
{
    int t;
    scanf("%d",&t);
    while(t--){
    
    int i,j,w,co=0,e,v;
    int source, target,x,y;
    scanf("%d%d",&v,&e);
     for(i=1;i<=61;i++)
    for(j=1;j<=61;j++)
    cost[i][j] = IN;
    
    N=0;
    for(i=1;i<=e;i++)
      {
          scanf("%d%d%d",&x,&y,&w);
          cost[x][y]=cost[y][x]=w;
          N=max(N,x,y);             
      }
      //printf("N==%d\n",N);
     
     /*
       for(i=1;i<=N;i++){
          for(j=1;j<=N;j++)
            printf("%d   ",cost[i][j]);
         printf("\n");
         }
      */
     int flag=1,sss=0;
     if(N<=2||v==1) flag=0;
    ///// 1st case for N==2;         
    if(flag){
    
    co += dijsktra(1,v);
    if(co!=0)////2nd test case
    {
    sss= dijsktra(1,v);
    if(sss)
    {
    co=co+30+sss;
    if(co<=49560){
    int h,m,s;
    h=co/3600;
    co=co%3600;
    m=co/60;
	s=co%60;
	      
	  if(s>0){
			s=60-s;
			m++;
	  	}
		if(m>59){
			h++;
			m=59;
		}
        else
		  m=59-m;
		
			h=14-h;
	printf("%d:%d:%d\n",h,m,s);
    }else printf("Not possible\n");
    }
    else
     printf("Not possible\n");     
    }
	else
	  printf("Not possible\n");     
	
    }////////// 1st case for N==2 end here         
    
    else
    {
        printf("Not possible\n");     
    }
    
    }
    
    return 0;
}
