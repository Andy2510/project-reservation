Reikia padaryti:
Virsutiniame meniu reikia log-out opcijos in menu dropdown
dish'u editas (kiekvienam dish`ui - atskiras puslapis)
Login redirects to Orders menu page (nepadarytas)
Logout redirects user to Dishes menu page (nepadarytas)

Admin panelis:





PRO - TASK: Restaurant application
Task
Create restaurant table reservation and online meal shop application using Laravel. Application must have 3 types of users: unregistered user, registered user, administrator.
Structure and guides
- Registration
    -- Form
        --- Name
        --- Surname
        --- Date of birth
        --- Phone number
        --- Email
        --- Password
        --- Password repeat
        --- Address
        --- City
        --- Zip code
        --- Country (dropdown - optional)
    -- Validation
        --- Name required
        --- Surname required
        --- Date of birth required, format YYYY-MM-DD
        --- Phone number required
        --- Email required, is valid email address
        --- Password required
        --- Password repeat must match with password
        --- Address required
        --- City required
        --- Zip code required, only numbers
        --- Country required
    -- Submit
        --- Saves user info to database
        --- Logins user to system
        --- Redirects user to Dishes menu page (nepadarytas)
- Login
    -- Form
        --- Email
        --- Password
    -- Validation
        --- Email required
        --- Password required
    -- Email and password must match with user in database
    -- Submit
        --- Logs user into system
        --- Redirects to Orders menu page (nepadarytas)
- User profile
    -- Same as in Registration with pre-filed user data
    - Users (Admin mode)
        -- Registered users list
            --- User ID
            --- Name surname
            --- Email
            --- Date of birth
            --- Phone number
            --- Address (including city, zipcode, country)
        -- Actions
            --- Delete user (deactivate optional)
            --- No delete button for current admin user
- Logout
    -- Logs out current user
    -- Redirects to home page
- Layout
    -- Restaurant logo
    -- Restaurant title
    -- Current page title
    -- Total items in cart + link to cart
    -- Content
- Dish Menu -> Add to cart button
-- Admin mode
    --- Create new item
    --- Update item
    --- Delete item
    --- Reorder (optional)
-- Table Validation
    --- Name required
    --- Number of persons at least one
    --- Date required, format: YYYY-MM-DD
    --- Time required, format: HH:mm
    --- Phone required
-- Pre-fill name, phone field if user is logged in (optional)
-- Admin mode
    --- List of reservations by users
    ---- Ordered by date from newest to oldest
    ---- Edit item
    ---- Delete item
-- Submit
    --- Saves reservation info into database
    --- Redirects user to Contacts page
- Cart
    -- List of items in cart
        --- Name
        --- Price
        --- Picture
        -- Totals
        --- Without tax
        --- Tax
        --- With tax
    -- Checkout button
        --- Redirects user to registration if not logged in
        --- Saves order info to database
        --- Redirects user to Dishes menu page
- Contacts
    -- Content
        --- Show google maps
        --- Show basic info about the restaurant (name, location, working hours)
    -- Admin mode (optional)
        --- Edit info in WYSIWYG editor
- Orders
    -- User orders list
        --- Order ID
        --- Customer ID
        --- Customer name, surname
        --- Total amount
        --- Tax amount
        --- Order creation date
    -- Admin mode
        --- All users orders
        --- Totals of all items in list
    - Order can have only 1 Table reservation
-- Use bootstrap, http://getbootstrap.com/
-- All elements of page which can be styled with bootstrap, MUST be styled with bootstrap
-- Use bootstrap themes, http://themes.getbootstrap.com/ (optional)
-- Responsive layout
-- Use AJAX for "Add to cart"
-- Use Laravel, http://laravel.com/
-- Use bitbucket or github to submit your code
-- Use Javascript API for google maps, https://developers.google.com/maps/documentation/javascript/adding-a-google-map
