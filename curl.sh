#!/bin/sh
curl -X POST -H "Accept: application/json;Content-Type: application/json" -d '{"code":"100002", "password":"c6ZK2R59", "name":"taro_yamada", "email":"taro_yamada+010@gmail.com"}' http://127.0.0.1:8000/api/v1/user
