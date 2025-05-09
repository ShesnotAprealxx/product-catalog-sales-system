🛍️ Product Catalog and Sales System
1. 🧑‍💻 User Flow

a. Registration
    -User visits the registration page.
    -Enters name, email, password, phone number.

System:
    -Validates input data.
    -Hashes the password securely.
    -Stores user in the Users table with default role customer.

b. Login
    -User logs in using email and password.
System:
    -Verifies the entered credentials.
    -Initiates a session/token.
    -Grants access based on user role.

c. Browsing Products
-All users can:
    -View a list of available products.
    -Search or filter by name, category, price range, or brand.
    -View product details: name, SKU, price, category, stock, images, description.

d. Purchasing Products
-Customers can:
    -Add products to a shopping cart or buy directly.
    -Modify cart contents (update quantities, remove items).

-On checkout:
    -System verifies product stock.
    -Calculates total amount.
    -Creates an order and deducts stock.
    -Sends confirmation email/SMS.

2. 🛠️ Admin Flow
a. Product Management
-Admins can:
    -Add/edit/delete products.
    -Manage stock, pricing, categories, and product images.
    -Assign products to one or more categories.
    -Set product availability (active/inactive).

b. Order Management
-Admins can:
    -View all customer orders.
    -Filter by status, customer, or date range.
    -Update order status (e.g., processing, shipped, delivered, cancelled).
    -View product-level details within each order.

3. 📏 Rules & Validations
    -Product stock cannot go below 0.
    -Only authenticated users can make purchases.
    -Passwords are stored securely using hashing (e.g., bcrypt).
    -Only admins can manage products and view/edit all orders.
    -Orders must include at least one item.
    -Product categories must come from a predefined list.

4. 🗄️ Database Schema (SQL)