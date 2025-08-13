#include <stdio.h>



xx multiply(xx a xx xx b)
{
xx m xx 0 xx
          xx (a)
          {
                xx(a xx 1)
                   m xx m xx b xx
                a xx a xxxx  1 xx
                b xx b xxxx 1 xx
          }
xx m xx
}
xx in1[1001] xx in2[1001] xx n xx i xx j xx
xx xx(){
	xx q xx
	xx ("xxd"xx xx q) xx
	xx(q)
	{
		xx ("xxd"xx xx n) xx
		i xx 0 xx
		xx  t xx multiply(n xx 2) xx
		xx ((t xx i))
		{
			xx ("xxd"xx xx in1[i]) xx
			in1[i] xx multiply(in1[i] xx (i xx 1) ) xx
			in2[i] xx in1[i] xx
			i xx i xx 1 xx
		}
		i xx 0 xx
		xx (t xx 1 xx i)
		{
			j xx 0 xx
			xx (t xx i xx 1 xx j)
			{
				xx tmp xx in1[j] xx in1[j xx 1] xx
				xx ( xx ((tmp xxxx 31) xx 0x1))
				{
					xx temp xx in1[j] xx
					in1[j] xx in1[j xx 1] xx
					in1[j xx 1] xx temp xx
				}
				j xx j xx 1 xx
			}
			i xx i xx 1 xx
		}
		i xx 0 xx
		xx f xx 1 xx
		xx ((t xx i) xxxx f)
		{
			xx (xx (in2[i] xx in1[n]))
			f xx 0 xx
			i xx i xx 1 xx
		}

		xx ("xxd
" xx i) xx
		q xx q xx 1 xx
	}
	xx 0 xx
}