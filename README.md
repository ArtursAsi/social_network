### Instructions:
Clone project
>git clone https://github.com/ArtursAsi/social_network

Install Composer
>composer install

Install npm
>npm install

Create .env file
>cp .env.example .env

Add Mailtrap.io
>link your mailtrap.io account in .env file

Link storage 
>php artisan Storage:link

Create Database with 5 tables
>Database 'query'
>>'user_attributes' with 4 columns
>>>user_id, weight, height, gender
>
>>'user_data' with 5 columns
>>>user_id, name, surname, age, location
>
>>'user_galleries' with 2 columns
>>>user_id, name
>
>>'user_pendings' with 3 columns
>>>user_id, request_to, status
>
>>'user_statuses' with 3 columns
>>>user_id, request_to, status


Migrate Database
>php artisan migrate


Generate key
>php artisan key:generate

Run app 
>php artisan serve



### Description

Social network app where you must register to view content. In the center is Your profile, on the left side are Your friends and on the right side are people from Your city.
You can add friends by sending them requests where they need to accept or decline your invitation.


