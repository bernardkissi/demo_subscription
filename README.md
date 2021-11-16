## API DOCS
### project setup
1. Setting up queues would be necessary to run background task

## Setup database 
1. setup database and run migrations to migrate all table
2. Run seeders per class basis ie. ```db:seed --class=[seeder]``` rather than calling ```db:seed```
3. After dummy data will be inserted into the database


## endpoints
1.  POST http://127.0.0.1:8000/api/site/{site}/posts -- create posts for a particular website
    ### sample request

    ```{
	        "title": "ddkkdsadxch",
	        "description": "fsdafd"
        }
    ```
    ### response sample

    ```
        {
            "data": {
                "title": "ddkkdsadxch",
                "slug": "ddkkdsadxch",
                "description": "fsdafd",
                "site_id": 1,
                "updated_at": "2021-11-16T07:12:03.000000Z",
                "created_at": "2021-11-16T07:12:03.000000Z",
                "id": 30
            }
        }
    ```

2.  POST http://127.0.0.1:8000/api/site/{site}/subscribe -- subscribes a user to a plan on a site
    ### sample request


    ```{
            "user_id": 2,
            "plan_id": 30
        }
    ```

    ### response sample

    ```{
            "data": {
                "plan_id": 3,
                "site_id": 8,
                "starts_on": "2021-11-16T07:57:33.465906Z",
                "user_id": 2,
                "updated_at": "2021-11-16T07:57:33.000000Z",
                "created_at": "2021-11-16T07:57:33.000000Z",
                "id": 13
            }
        }
    ```

3.  GET http://127.0.0.1:8000/api/site/{site}/subceribers -- get users subscribed on a set
    ### sample response
    
    ```{
        "data": {
            "id": 1,
            "name": "Vincenza Ebert Jr.",
            "slug": "vincenza-ebert-jr",
            "created_at": "2021-11-16T04:45:53.000000Z",
            "updated_at": "2021-11-16T04:45:53.000000Z",
            "subscribers": [
            {
                "id": 1,
                "name": "Verdie Kozey IV",
                "email": "hayes.maxwell@example.com",
                "email_verified_at": "2021-11-16 04:45:53",
                "created_at": "2021-11-16T04:45:53.000000Z",
                "updated_at": "2021-11-16T04:45:53.000000Z",
                "pivot": {
                "site_id": 1,
                "user_id": 1
                }
            },
            {
                "id": 2,
                "name": "Maybelle Veum",
                "email": "hertha.block@example.org",
                "email_verified_at": "2021-11-16 04:45:53",
                "created_at": "2021-11-16T04:45:53.000000Z",
                "updated_at": "2021-11-16T04:45:53.000000Z",
                "pivot": {
                "site_id": 1,
                "user_id": 2
                }
            }
            ]
        }
        }
```

## Mail setup

1. used mailtrap to setup emails to subscribers

## Events
Since this was smaller project all events were run from the booted methods of the model