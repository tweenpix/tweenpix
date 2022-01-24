#!/usr/bin/env bash
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
