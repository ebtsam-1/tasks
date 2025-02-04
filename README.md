Installation Seps <br>
<br>
1- get into any folder then open a terminal and paste this: git clone git@github.com:ebtsam-1/tasks.git <br>
2- rename .env.example file to be .env then add your database credentails to the file <br>
3- open a terminal in the project folder and run composer i <br>
4- then run php artisan key:generate in the terminal <br>
5- then run  php artisan migrate --seed <br>
then run php artisan serve <br>
6- I have attached postman collection for the requested endpoints => Tasks.postman_collection.json, feel free to update the server link => to your server data <br>
7- I have created testing for two endpoints to check that please run php artisan test <br>
