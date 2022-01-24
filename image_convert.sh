#!/usr/bin/env bash
for a in $( ls *.jpg)
do
jpegoptim --all-progressive -q75 -s -v -f $a $a
done
 
for i in $( ls *.jpg)
 do
  convert -adaptive-resize 2560x $i 2560-$i;
  convert -adaptive-resize 1920x $i 1920-$i;
  convert -adaptive-resize 992x $i 992-$i;
  convert -adaptive-resize 576x $i 576-$i;
done

for z in $( ls *.webp)
 do
  convert -adaptive-resize 2560x $z 2560-$z;
  convert -adaptive-resize 1920x $z 1920-$z;
  convert -adaptive-resize 992x $z 992-$z;
  convert -adaptive-resize 576x $z 576-$z;
done

#!/usr/bin/env bash
for x in $( ls *.webp)
 do
    cwebp -q 75 -m 6 $x $x
done
