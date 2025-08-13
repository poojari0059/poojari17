#include <stdlib.h>

#include <string.h>

#include <math.h>

#include <stdio.h>

int main()
{
	int t,ax,ay,bx,by,cx,cy;
	float la,lb,lc,x,y;
	scanf("%d",&t);
	while(t--)
	{
	  scanf("%d%d%d%d%d%d",&ax,&ay,&bx,&by,&cx,&cy);
	  la=sqrt(pow(bx-cx,2)+pow(by-cy,2));
	  lb=sqrt(pow(cx-ax,2)+pow(cy-ay,2));
	  lc=sqrt(pow(bx-ax,2)+pow(by-ay,2));
	  x=(ax*la+bx*lb+cx*lc)/(la+lb+lc);
	  y=(ay*la+by*lb+cy*lc)/(la+lb+lc);
	  float s,r,q;
	  if((x==ax&&y==ay)||(x==bx&&y==by)||(x==cx&&y==cy))
	    printf("NA\n");
	  else
	  {
		 
	  int p=floor(x);
	  int q=floor(y);
	  printf("%d %d\n",p,q);
     }
    }
}