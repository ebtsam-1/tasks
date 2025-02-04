Installation Seps

1- get into any folder then open a terminal and paste this: git clone git@github.com:ebtsam-1/tasks.git
2- rename .env.example file to be .env then add your database credentails to the file
3- open a terminal in the project folder and run composer i
4- then run php artisan key:generate in the terminal
5- then run  php artisan migrate --seed
6- I have attached postman collection for the requested endpoints => Tasks.postman_collection.json
7- I have created testing for two endpoints to check that please run php artisan test
