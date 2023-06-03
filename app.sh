#!/bin/bash

init() {
	php artisan migrate:fresh
	php artisan db:seed
}

if [ "$1" == "init" ]; then
	init
fi
