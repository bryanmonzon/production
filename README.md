This is a rough concept for a production and includes the use of Laravel Echo and Pusher for broadcasting live updates. 

### Steps to install
1. Set up your DB and add the credentials to your `.env` file
1. `php artisan key:generate`
1. `composer update` to install composer dependencies
1. `php artisan migrate`
1. Add `PUSHER_APP_ID`, `PUSHER_APP_KEY`, `PUSHER_APP_SECRET`, `PUSHER_APP_CLUSTER` to your `.env` file
1. Start the queue worker `php artisan queue:work`
1. `npm install` install JavaScript packages
1. `npm run dev` compile JavaScript

Add A Plan, Add a Project, go the project logged into a two accounts and you should see some live updates right before your very eyes. 

Again, this was a rough concept, intended for sketching out an idea and playing with Laravel Echo and Pusher. 
