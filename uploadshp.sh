#!/bin/bash

INFO="$(/usr/local/bin/gdalsrsinfo $1*.shp | tail -2)"
echo "$(/usr/local/bin/gdalsrsinfo $1*.shp | tail -2)"
if [[ $INFO = *"EPSG"* ]]; then
  SRID=${INFO//[!0-9]/}
#  echo $SRID
  /usr/local/bin/shp2pgsql -s $SRID:4326 $1*.shp $2 | /usr/local/bin/psql -p 5432 -d spatu -U spatu
else
#  echo "Nothing"
  /usr/local/bin/shp2pgsql -s :4326 $1*.shp $2 | /usr/local/bin/psql -p 5432 -d spatu -U spatu
fi
#echo $1
