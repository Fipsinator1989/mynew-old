#!/bin/bash

rm -rf /tmp/cookie.txt 

php -f drupal.php >/dev/null


if [ "$?" == "0" ]; then

	STATE_OK=0

	/bin/echo "LOGIN OK: Authentication successfull"

	exit $STATE_OK

elif [ "$?" == "2" ]; then

	STATE_CRITICAL=2

	/bin/echo "LOGIN Critical: Authentication unuccessfull"

	exit $STATE_CRITICAL

elif [ "$?" == "3" ]; then

	STATE_UNKNOWN=3

	/bin/echo "LOGIN Unknown: Authentication unknown"

	exit $STATE_UNKNOWN

fi

