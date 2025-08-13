#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>



int G[51];
int dp[51][51];
int vis[51][100];
int min(int x,int y)
{
  return ((x<y)?x:y);   
}

int getCount(int s, int k)
{
    int ret = 0;
    int i;
    if(k == 0) return (s == 0);
    if(dp[s][k] != -1) return dp[s][k];

    for(i= 1; i <= s/k; i++)
        ret += getCount(s - k*i, k-1);

    return dp[s][k] = ret;
}


void backTrack(int init_pile_size, int curr_pile_size, int prev, int xr)
{
     int i;
    if(!curr_pile_size){
        if(prev) vis[init_pile_size][xr] = 1;
        return;
    }

    int st = prev + 1;
    for( i = st; i <= min(curr_pile_size, init_pile_size-1); i++)
        backTrack(init_pile_size, curr_pile_size - i, i, xr ^ grundy(i));
}

int grundy(int pile_size)
{
    if(G[pile_size] != -1) return G[pile_size];
    backTrack(pile_size, pile_size,0,0);

    int ret = 0;
    while(vis[pile_size][ret]) ret++;
    return G[pile_size] = ret;
}

int main()
{
    int i, j, k, t;
    int n, xr, v;

   

    scanf("%d", &t);
    while(t--)
    {
        scanf("%d", &n);
        xr = 0;
        for(i=0;i<=51;i++)
        {
           G[i]=-1;
        }
         for(i=0;i<=51;i++)
        {
                for(j=0;j<=51;j++)
                    dp[i][j]=-1;                
        }
       for(i=0;i<=51;i++)
        {
                for(j=0;j<=100;j++)
                    vis[i][j]=0;                
        }
        for(i = 1; i <= n; i++)
        {
            scanf("%d", &v);
            xr ^= grundy(v);
        }

        if(xr) printf("CAPTAIN AMERICA");
        else printf("IRONMAN");
        printf("\n");
    }
    return 0;
}
