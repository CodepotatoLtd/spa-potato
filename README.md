# SPA Template Repository
## "SPA Potato"

This repository has been created to save us time when we have a new client project. This comes pre-installed with
the latest version of Laravel and Vue. It has been pre-configured to run as an SPA and has a full authentication system 
ready out of the box. Since the authentication system was created using Laravel Breeze, you can quite easily customise the 
login and registration behaviour.

### Features of this repository
- Authentication system built
- SPA-ready, with routes and Vue 2.0 installed (Vue 3 coming soon)
- Vuex pre-installed
- Inter font setup as the default font
- TailwindCSS with purging
- User and CSRF Token in the state for easy access

### How to set up

1. Create a new repository and select "spa-potato" as a repository template
2. Clone the new repository you have just made to your local system
3. Run `composer install`, `cp .env.example .env`, `npm install` and `npm run dev`
4. Next, create a database for the app and run `php artisan migrate`.
5. This repository also uses Lasso, so search 1Password for "Lasso DO Bucket" and copy the API keys.
