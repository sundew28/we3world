# We3World Code Test

An application to send API request and receive response as JSON. I have used laravel 10 framework to create the application and JWT to set up the authentication.

## Requirements

- PHP :- 8.1 or above
- MySQL :- 5.6 or above
- Composer :- To install the dependencies
- Postman :- To test the API calls

## Install

Clone the repo to your working directory using your favorite CLI console (eg: GitBash, PowerShell, cmd or any of your choice) 

```bash
$ git clone https://github.com/sundew28/we3world.git
```

Once you are done cloning the repo next would be to run composer in your console to install laravel framework dependencies by running the below composer command. Make sure you have composer installed

Via Composer

```bash
$ composer install
```

Next would be to change your .env file to set your database credentials in your root .env file. Once completed run the below command in your console which
will set up your database tables migraion and seeding and setting up your JWT secret key in .env file.

```bash
$ composer run setup
```
This would create all the basic tables to run your application smoothly. I have created a basic user account for easy to use in this case and populated the products table with dummy data for the purpose of testing.

```php
// User account
   Email : admin@artlume.io
   Password : adminadmin
```

## Security

For API authentication / security i have implemented the JWT auth instead of using sanctum or OAuth. JSON Web Token (JWT) is an open standard that allows two parties to securely send data and information as JSON objects. This information can be verified and trusted because it is digitally signed. JWT authentication has aided the wider adoption of stateless API services.

Your JWT authentication key is already set in the .env or enviorment file.

Check your .env file if the secret key is generated with hash alogorithm, an example like below
```
JWT_SECRET=AYBKioTi6AOI1EOEMJkmrH8vHDquUnmot4ff6w7d4XBB3WC93ceqmSMJAtW8kxco

JWT_ALGO=HS256

```

## Testing the Application

The API endpoint require a "get" request to be made which is already made mandatory in the api route file for secure transfer of data.

### Task 

The instructions were to call API end point to grab products.

Login :

```bash
Url : <define your localhost with port/virtual domain>/api/login
Params : 
- email <already a user account with email created. Please refer the doc for the informations>,
- password
```
The API will return you with a secure token generated for use. Next you can use the token be set under the Authorization tab.

```
Authorization --> Type (Select Bearer Token)
```
### API Endpoint

1) GET <define your localhost with port/virtual domain>/api/products - grab minimum 5 products with their attributes. Returns a json response. At this point i have implemented a method to return random 5 products from the products table.

    Response example

    ```bash
    {
        "id": 9,
        "name": "brozkwwqfcmlwmnebhgu",
        "code": "prod-1616",
        "price": "686.06",
        "created_at": "2024-04-18T12:43:24.000000Z",
        "updated_at": "2024-04-18T12:43:24.000000Z"
    },
    {
        "id": 1,
        "name": "mnifzxnwaqabtwgtxuds",
        "code": "prod-9216",
        "price": "12.40",
        "created_at": "2024-04-18T12:43:24.000000Z",
        "updated_at": "2024-04-18T12:43:24.000000Z"
    },
    {
        "id": 3,
        "name": "kplcxvhhnpbdtigluluu",
        "code": "prod-5269",
        "price": "906.26",
        "created_at": "2024-04-18T12:43:24.000000Z",
        "updated_at": "2024-04-18T12:43:24.000000Z"
    },
    {
        "id": 5,
        "name": "duoeargzorlvyplecfjd",
        "code": "prod-0487",
        "price": "681.44",
        "created_at": "2024-04-18T12:43:24.000000Z",
        "updated_at": "2024-04-18T12:43:24.000000Z"
    },
    {
        "id": 10,
        "name": "sgkcyyafaybeqawxtjxs",
        "code": "prod-6547",
        "price": "83.91",
        "created_at": "2024-04-18T12:43:24.000000Z",
        "updated_at": "2024-04-18T12:43:24.000000Z"
    }
    ```

## Test case

For running the test case just follow the command below in your console
```bash
php artisan test
```

## Improvements

- I would like to make improvement to the error capturing by making use of error handler in laravel, make use of JsonResponse error handling
- Check the quality of code by using tools like PHPsniffer, PHP-CS-Fixer with PSR2 and Symfony standards (much extra checks, closer to Laravel than PSR2).
- Writing unit tests and feature tests to ensure API functionality better. The current test is just basics.
- I have used the repository design pattern for this API development. We can use the Laravel manager/builder design pattern based on requirement.
- Adding caching(redis) service for better performance.
