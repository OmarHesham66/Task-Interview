-- Task --
- Architecture:
1- the task built by laravel and mysql and used to the Mvc design pattern and the solution focuses on back-end significantly with also customize on frontend.
  
- Design :
1- i designed website to two parts , first part consist of admin panal who can to manage the products , categories , orders , addresses of shiping and users that they are registered in website , admin can do crud operations to categories and product and can admin to monitor the orders that created in website by users ,second part consist of website display the offers and some products and categories.
   
  *Backend*

.tools Used : Laravel - MySql - Livewire - Integrated with third party api for countries
  1- Controllers : 
  
  Admin => the five controllers contains actions for crud operations in categories and products and orders and shipping
  
  User => the six controllers contains:
  
       --Auth controller which contains actions for show (login-register-homePage-logout) 
       
       --Shop controller contains action for control filter by category for product and display products in database
       
       --Cart controller display cart page and i handle update in qunatity of products after included in cart by livewire package
       
       --Product controller display product card with all information and i handle also button (add to cart) so that when clicked button in same time change cart icon and display product in icon
       
       --Checkout controller display address form to enter data of shiping and apply for it validation and when success that created invoice with offers if found
       
       --Account controller display all invoices included (number_of_order - user_id - status_of_order - vat - shipping_price - offers if found - total_price) and shipping addresses for user
       
 *Main Classes*
 
  1-CountryService : it is responsible for integrated with third api through send http method type of (get) for get all country to display it for user in checkout page.
  
  2- (IOrder - OperationsOrder) : i applied one of principles in class (open close principle) through interface IOrder and class OperationsOrder implement it and the class responsible for create operation for order and second function is handle offers and calculate 
      amount and return assocative array of offers if found. 
      
  3- (ICartRepository - CartRepository) :i also applied (open close principle) and Repo Repository design pattern and the class responsible for make operations cart which it be (create - show - empty - delete - total_price - update) and all of these operations help me 
      to handle cart.
      
  4- Photo : it is responsible for handle image and fileSystem.
  
  5- Get_Cookie : it is responsible for handle cookies in browser for cart of unauthenticated user.
  
  6- UpdateQty : it is responsible for decremnt qty in product after create invoice and order.
  

 ***Problems***
 
   Problem 1 : I had a problem with the (Add to Cart) button when I add product in cart , the icon of cart change in same time.
   Solution : i handle it through livewire package and (event and listener).

   Problem 2 : I had a problem with the (Add to Cart) button when I kept pressing the button, the quantity increased and was greater than the product quantity.
   Solution : i handle it through add condition when increase the quantity if quantity in cart greater than quantity in product , add quantity in product in cart.

   Problem 3 : I had a problem with how i can display orders in admin panal with addresses and with order items.
   Solution : i handle it through bootstrab , i used collapse component display order items and shipping address in table orders when i press in button show address and show order items in table orders.
 
   Problem 4 : I had a problem in sizes and colors of products and i left out because the time of task but i had handle it in one of projects that i had work on it.

 *Packages*
 
   Livewire : i used it for change part in page without reload all page (ex => icon cart - increase qty in cart page)
   Notify : i used it for make beautiful custom message after each action happend in website

   *Frontend*
   - custom layouts and views to be responsive for requirments of task.
