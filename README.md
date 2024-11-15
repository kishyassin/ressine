# Restaurant Management - Ressine

<img src="./Opening.png" alt="Your Name" width="100%"/>
A restaurant management application developed with Laravel, Filament, Breeze, ShoppingCart, and Stripe. It allows
customers to order online, track their orders, and give feedback on dishes. Chefs, delivery personnel, and
administrators also have their own management interfaces.

## Features

### For Customers:

- **Authentication**:  
  Customers can sign up or log in with the necessary information.

- **Menu Exploration**:  
  Customers can browse available dishes by category.

- **Cart Management**:  
  Add, modify, or remove dishes in the cart and confirm orders.

- **Payment Options**:  
  Online via Stripe or cash on delivery.

- **Order Tracking**:  
  Customers can see the status of their orders through a dashboard.

- **Writing Testimonials**:  
  Write testimonials that will be displayed after administrator validation.

- **Dish Rating**:  
  Rate dishes with stars, one rating per dish.

- **Profile Management**:  
  Modify profile information and recover the password.

### For Chefs:

- **Authentication**:  
  Dedicated login for chefs.

- **Order Management**:  
  View and modify the status of orders (pending, in preparation, prepared).

- **Statistics Tracking**:  
  Track total orders, those prepared by the chef, and those pending.

### For Delivery Personnel:

- **Authentication**:  
  Dedicated login for delivery personnel.

- **Invoice Management**:  
  View and modify the status of invoices (pending, in delivery, delivered).

- **Statistics Tracking**:  
  Track pending invoices and those delivered by the delivery personnel.

### For Administrators:

- **Application Information Management**:  
  Modify general application information.

- **Management of Services, Categories, Dishes, Chefs, and Delivery Personnel**:  
  Add, modify, or delete services, categories, dishes, chefs, and delivery personnel.

- **Testimonial Validation**:  
  Change the status of testimonials before display.

- **Restaurant Metrics Tracking**:  
  View the number of customers, orders, and total amounts.

## Technologies Used

- **Backend** : Laravel 11.9
- **Frontend** : Filament / Blade
- **Authentication**: Breeze
- **Cart**: ShoppingCart
- **Payment**: Stripe

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/kishyassin/ressine
   ```

2. Install dependencies:
    ```bash
    composer install
    npm install
   ```

3. Configure your .env file and generate the application key:
   ```bash
    cp .env.example .env
    php artisan key:generate
   ```

4. Run the migrations:
    ```bash
    php artisan migrate
   ```

5. Implement ShoppingCart :
   from anayarojo/shoppingcart
    ```bash
    composer require anayarojo/shoppingcart
    php artisan vendor:publish --provider="Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="config"
   ```

6. Start the development server:
   ```bash
    php artisan serve
    npm run dev
   ```

7. To test the display with real data, insert the script contained in the `data.sql` file into the database.

8. Pour ajouter un administrateur, veuillez créer votre compte, puis accéder à la base de données pour changer le rôle
   de l'utilisateur en administrateur ou utilisez la commande `php artisan make:filament-user`.

## Contribution

Contributions are welcome. To submit changes, please fork the project, create a branch, and submit a pull request.

## License

This project is licensed under the MIT License.





