## Technical test

Using Laravel / Vue

Create a form to subscribe to a newsletter. Please spend no more than 2 hours to complete this.

1. Email field completed in a form on the page is submitted to backend, show a success message “x” after successful submission.
2. The email address is added to a newsletter recipients table
3. Queue up a job that is responsible for sending the newsletter email to the given email address (the email can simply say “Here is our newsletter”)

## Installation instruction
- Clone a repository `git clone git@github.com:bakhtiyor/ev-comply-test-assignment.git ev-comply-test-assignment` 
- Go to the application folder `cd ev-comply-test-assignment`
- Install dependencies `composer install`
- Copy .env.example file and create a new .env file (`cp .env.example .env`)
- Run `php artisan key:generate` to generate your application encryption key
- Set following parameters in .env file
  - `DB_DATABASE` - the name of you database 
  - `DB_USERNAME` - database username
  - `DB_PASSWORD` - database password 
  - `QUEUE_CONNECTION=database` - use `database` driver for a queue 
  - set `MAIL_XXX` parameters for sending email, a sample MAIL configuration
    - `MAIL_DRIVER=smtp`
    - `MAIL_HOST=smtp.gmail.com`
    - `MAIL_PORT=587`
    - `MAIL_USERNAME=your_name@gmail.com`
    - `MAIL_PASSWORD=your-password`
    - `MAIL_ENCRYPTION=tls`
    - `MAIL_FROM_ADDRESS=your_name@gmail.com`
    - `MAIL_FROM_NAME="${APP_NAME}"`
- Run `php artisan migrate` to create necessary tables
- Run `npm install` to install all dependencies
- Run `npm run dev` to compile your assets
- Run `php artisan serve` to start the application, usually it starts a development server on `http://127.0.0.1:8000`, open it on your browser
- Run `php artisan queue:listen` to start and listen a queue worker and process new jobs
- Enter your email in a subscription form and click `Subscribe Me` button
- An welcome email should come to an Inbox of the specified email after a while. If there is no email in an Inbox then probably it is in a Junk folder

