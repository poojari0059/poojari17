#include <stdio.h>



char T[]={'0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J'};

val(char c)
{
    if (c >= '0' && c <= '9')
        return (int)c - '0';
    else
        return (int)c - 'A' + 10;
}

void R(char *s,int n)
{
   int i;
    for(i=0;i<n/2;i++)
    {
        char t = s[i];
        s[i] = s[n-i-1];
        s[n-i-1] = t;
    }     
}
int L(char *x)
{
    int i=0;
    while(*x!='\0'){x++;i++;}
    return i;
}
void F(int s,char p[],char q[])
{
  char A[500];
  
  int i=0,j=0,a,b,f=0,m,c=0,k=0;
  i=L(p);
  j=L(q);
  
  R(p,i);
  R(q,j); 
  while(*p||*q)
  {
          a=(*p?val(*p): 0);
          b=(*q?val(*q): 0);
          if(a>=s||b>=s){
            f=1;
            break;          
          }
          else
          {
               m=(a+b+c)%s;
               c=(a+b+c)/s;
               A[k++]=T[m];
                     
          }
     if(*p) p++;
     if(*q) q++;      
  }
  if(c)
     A[k++]=T[c];
  A[k]='\0';
  R(A,k);
  
  if(f) printf("NA\n");
  else{
  char *n=A;
  while(*n!='\0'&&*n=='0') 
    n++;
  if(*n=='\0')
  {
     printf("0\n");
     
     return;              
  }
   printf("%s\n",n);
   } 
  
}
 main()
{
    int t,b;
    scanf("%d",&t);
    while(t--)
    {
       
       char p[51],q[51];
       scanf("%d %s %s",&b,p,q);
       F(b,p,q);
    }
   
    return 0;
}





