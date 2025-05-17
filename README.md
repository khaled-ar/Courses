## Setup instructions:

1 - *[Use composer update command]*
2 - *[Use php artisan migrate command]*
3 - *[Use php artisan db:seed command]*

## API endpoints testing:

1 - **[Register a new user, Request method:POST](api/auth/register)**
    -- Attributes: name, email and password.

2 - **[Loging the user, Request method:POST](api/auth/login)**
    -- Attributes: email and password.

3 - **[Get available courses, Request method:GET](api/courses)**
    -- The user should be logged in.

4 - **[Enroll in course, Request method:POST](api/courses/enroll/{course})**
    -- The user should be logged in.
    -- Query params: course.

5 - **[My courses, Request method:GET](api/courses/enrolled)**
    -- The user should be logged in.

## Notes:

1 - *[Dummy data was created for testing purposes.]*
    -- Factories path: database/factories/[courses|user].
    -- Seeder path:    database/seeders/[DatabaseSeeder.php].

2 - *[The errors have been handled.]*
    -- Handler path: bootstrap/[app.php].

3 - *[Postman was used for the documentation.]*
    -- Link: https://documenter.getpostman.com/view/42423619/2sB2qWJ4h2
    -- Note: For each request we can save multi response cases and errors.
