Hello, everyone. This is a test assignment for Solita Dev Academy

The task was to create a web application that fetches data from database and represents them in some appropriate way.

So, what did i do.
-used Laravel and PHP for backend.
-used livewire to make data lazy load from db

-wrote a seeder that can parse *.csv files and fill database with ~3M entries.
-used open leaflet library to add a map for bicycle stations and journeys.

-wrote an api endpoint to add new journey. 
-unit tests check if whole application and separate page work correctly.

-implemented the project on hosting https://solita.arcadepub.ru/

*Data import
In order to fill the database with all entries firstly we need to make all tables. There is a migrations that help us with this. When all tables are created we can fill them with data. 
There is an artisan command for that purpose

php artisan migrate --seed

*Journey list 
The page https://solita.arcadepub.ru/journeys shows a table with all entry list. 
There are about 3M etries, so i fetched only first page and made a lazyload system with laravel livewire for other pages.
There are also real-time search and sort functions.
! Unfortunately, livewire doesn't allow to change frontend elements with easy. So, i didn't create filtering feature and icons aren't changed after click.

*Station list
The page https://solita.arcadepub.ru/stations shows a table with all stations. 
There are only about 1k entries, that's why i used laravel pagination system here.

*Single journey view
The page https://solita.arcadepub.ru/journey/1 shows a single journey information and draws a map if there is enough data.

*Single station view
The page https://solita.arcadepub.ru/station/1 shows a single station information.
-Total number of journeys starting from the station
-Total number of journeys ending at the station
-The average distance of a journey starting from the station
-The average distance of a journey ending at the station
-Top 5 most popular return stations for journeys starting from the station
-Top 5 most popular departure stations for journeys ending at the station
-And shows the station on a map.

*API 
You can use an API endpoint to add a new journey. 
The endpoint http://solita.arcadepub.ru/api/journeys expects a POST request with all data. 
! Donn't forget about Bearer Authorization Header
The token is "AAAAAAAAAAAAAAAAAAAAAMLheAAAAAAA0%2BuSeid%2BULvsea4JtiGRiSDSJSI%3DEUifiRBkKG5E2XzMDjRfl76ZC9Ub0wnz4XsNiRVBChTYbJcE3F"

Curl request example: 

curl -X POST -H 'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAMLheAAAAAAA0%2BuSeid%2BULvsea4JtiGRiSDSJSI%3DEUifiRBkKG5E2XzMDjRfl76ZC9Ub0wnz4XsNiRVBChTYbJcE3F' -H 'Content-Type: application/x-www-form-urlencoded' -i 'http://solita.arcadepub.ru/api/journeys' --data 
'departure_time=2009-10-16T11:11:11
&return_time=2009-10-16T11:11:11
&departure_station_id=123
&departure_station_name=asd
&return_station_id=123
&return_station_name=asd
&covered_distance=123
&duration=1232'

*What i couldn't do.

1) I wanted to try the laravel livewire but it doesn't allow to work with frontend. So, buttons and other elements that are supposed to be dynamic aren't changed.
2) It would be better to use react or vue, but I'm not good at with them enough.
3) I faced with problems when I tried to implement this project in a docker container. I clarified that php container had some issues with access permissions and web server container couldn't access the php files. i'm still on my way to deal with it. But there is not dockerfiles in this project yet.

I suppose there is plenty of work to run this project on local machine without docker. But you can check it out on https://solita.arcadepub.ru/