#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main() {
    int i,j,k,le,b[100],n,m,x,y,s,r,no,sum=0;
    int *a[100];
    for(i=0;i<=100;i++)
         a[i]=(int*)malloc(100*(sizeof(int)));
    
scanf("%d%d",&n,&m);
    for(i=1;i<=n;i++){
        for(j=1;j<=n;j++)
        {
        a[i][j]=1001;
        }b[i]=0;}
    for(i=1;i<=m;i++)
        {
        scanf("%d%d%d",&x,&y,&r);
        a[x][y]=r;
        a[y][x]=r;
    }
    s=1;
    b[s]=-1;
    for(k=1;k<n;k++){le=1001;
    for(i=1;i<=n;i++)
        {
        if(b[i]==-1)
            {
            for(j=1;j<=n;j++)
                {
                if((a[i][j]<le)&&(b[j]==0)){
                    le=a[i][j];no=j;}
            }
        }
    }
                     sum=sum+le;
                    
                     b[no]=-1;
                    }
    printf("%d",sum);  
    return 0;
}
