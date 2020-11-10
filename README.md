# Turbulent Test

## Server Requirements

* PHP >= 7.4
* [Composer](https://getcomposer.org/)
* MySQL or MariaDB

See all Laravel requirements [here](https://laravel.com/docs/8.x#server-requirements).

## Installing

1. Clone the repository
    ```
    git clone https://github.com/ronanflavio/turbulent-test.git
    ```

2. Navigate to the project
    ```
    cd turbulent-test
    ```

3. Install the composer dependencies
    ```
    composer install
    ```

4. Create the environment file through the example
    ```
    cp .env.example .env
    ```

5. Configure the database environment variables
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=johnny
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run the migrations (assuming you already have the database working)
    ```
    php artisan migrate
    ```

7. Serve the application
    ```
    php artisan serve
    ```

## Get the top selling products

* **URL**

    `/reports/top-selling-products`

* **Method**

    `POST`

* **URL Params**

    None

* **Data Params**

    **Required**

    `startDate=[date_format:Y-m-d]`

    `endDate=[date_format:Y-m-d]`

    **Optional**

    None

* **Success Response**
    * **Code:** 200

        **Content:**

        ```json
        [
            {
                "count": 31,
                "skuId": 30,
                "name": "kitkat"
            },
            {
                ...
            }
        ]
        ```

* **Error Response:**
    * **Code:** 422 UNPROCESSABLE ENTITY

        **Content:**

        ```json
        {
            "message": "The given data was invalid.",
            "errors": {
                "startDate": [
                    "The start date field is required."
                ],
                "endDate": [
                    "The end date field is required."
                ]
            }
        }
        ```

    OR

    * **Code:** 422 UNPROCESSABLE ENTITY

        **Content:**

        ```json
        {
            "message": "The given data was invalid.",
            "errors": {
                "startDate": [
                    "The start date does not match the format Y-m-d."
                ],
                "endDate": [
                    "The end date does not match the format Y-m-d."
                ]
            }
        }
        ```

* **Sample Call**

    ```javascript
    $.ajax({
        url: "/reports/top-selling-products",
        dataType: "json",
        type : "POST",
        success : function(res) {
        console.log(res);
        }
    });
    ```
