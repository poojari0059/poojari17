#include <stdio.h>

B['(('];
float A['(('];

float M(float j, float i){
     asm ("fmul"	: "=t" (j) : "%0" (j), "u" (i));
     return j;
}

float S(float j, float i){
     asm ("fadd"	: "=t" (j) : "%0" (j), "u" (i));
     return j;
}

W()
{

       scanf("%f%f%f",&A[' '],&A['"'],&A['.']);
       A['('] = ')'%'(' ;
       asm ("fsub" 	: "=t" (A['(']) : "%0" (A['(']), "u" (A['.']));
       A[' ']=M(A[' '], S( M(A['('],A['(']), M(A['.'],A['.']) ));
       asm ("fdiv" 	: "=t" (A['(']) : "%0" (A[' ']), "u" (S(A[' '],M(A['"'] , M(')'%'\'' , M(A['.'] , A['(']))))));
       printf("%.2f\n",A['('] );

  B['"']=S(B['"'],')'%'(');
  if(B['"']!=B[' '])
    {
          W();
    }
}

main()
{
    scanf("%d",&B[' ']);
    W();
    exit(!'(');
}
