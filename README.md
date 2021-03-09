# Blog

A simple blogging platform where users can post content and which also fetches posts from another platform.

## Setup Instructions

```
git clone git@github.com:aurelzefi/blog.git
```

```
cp .env.example .env
```

```
php artisan key:generate
```

```
composer install
```

```
npm install
```

```
npm run dev
```

Create a database and set the `DB_DATABASE` environment variable. Then migrate and seed the database:

```
php artisan migrate --seed
```

You will have a user with the following credentials available:

- email: aurelzefi1994@gmail.com
- password: password

The posts from the external platform will be fetched by a queued job (`App\Jobs\FetchExternalPosts`), which is configured to run every two hours.
The job is queued, so in a production environment there will be no performance issues.

For your convenience, I have created an artisan command, so you can run the job manually during testing.

```
php artisan external-posts:fetch
```
