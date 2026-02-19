# crypto-app

1. Clone the repository:
    ```bash
    git clone https://github.com/tomlowen/crypto-app.git
    ```
2. Navigate to the api directory of the project and install the dependencies:
    ```bash
    cd crypto-app/api
    composer install
    ```

3. Set up crypto_app database

4. Set up environment variables:
    - Create a `.env` file in the root directory.
    - Add the required variables as specified in my email.
    - Add the database values.

5. Run the commands to initialise the backend data and serve the app:
    ```bash
    php artisan migrate
    php artisan app:sync-coin-prices
    php artisan serve
    ```

6. In a new terminal, cd into the client directory and install the dependencies:
    ```bash
    cd crypto-app/client
    npm install
    ```

7. Set up environment variables:
    - Create a `.env` file in the root directory.
    - Add the required variables as specified in my email.

8. run 
    ```bash
    npm run dev
    ```
    and Open the application in your browser at `http://localhost:3000`.