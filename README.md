## Overview
This repository is using Uncle Bob's clean architecture approach.
Written in PHP.

## Description
Clean architecture has four layers.

・Entity  
Entity represent bussiness rules.  
・Usecase  
Usecase represent application specific rules.  
・Controller/Gateway/Presenter  
It is interface adapter.  
・UI/Web/Device/DB/API  

This repository has the following four packages.And This repository use Laravel Framework.  

・[Clean\Web\Adapter](https://github.com/ShinyaIshikawa/PHPCleanArchitecture/tree/master/packages/clean/web/src/Adapter)  
Adapter layer include repository implementations and MVC.  

・[Clean\Web\Usecase](https://github.com/ShinyaIshikawa/PHPCleanArchitecture/tree/master/packages/clean/web/src/Usecase)  
Usecase include UsecseInteractor and DataAccessInterface.  

・[Clean\Web\Domain](https://github.com/ShinyaIshikawa/PHPCleanArchitecture/tree/master/packages/clean/web/src/Domain/Model)  
Domain include Entity objects.  

## Installation

・Start Docker container(PHP,Nginx,Mysql)
~~~
docker-compose up -d
docker exec php php html/artisan migrate
~~~

・API Demo Request 
~~~
./curl.sh
~~~

