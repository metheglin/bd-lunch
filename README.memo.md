
## Test

http://bd-lunch.rv-php5.6.net/

```
cd /vagrant/shared/bd-lunch

php -a
bin/cake console
```

```
mysql -uroot
mysql> drop database bdlunch;
mysql> create database bdlunch;
bin/cake migrations migrate
bin/cake migrations seed
```

### Version1 --- Meal Introduction ---

```
/bin/cp -f src/Controller/Meals1Controller.php src/Controller/MealsController.php
diff  src/Controller/Meals1Controller.php src/Controller/MealsController.php

/bin/cp -f src/Template/Meals/dashboard1.ctp src/Template/Meals/dashboard.ctp
diff  src/Template/Meals/dashboard1.ctp src/Template/Meals/dashboard.ctp

/bin/cp -f src/Template/Meals/request1.ctp src/Template/Meals/request.ctp
diff  src/Template/Meals/request1.ctp src/Template/Meals/request.ctp
```

http://bd-lunch.rv-php5.6.net/

- Main Code
  - MealsController
  - MenuesSeed
- Explain
  - Prepare Meal Data for many countries
  - User also has country
  - Choosing country and prepare the food

### Version2 --- Meal Bugfix ---

- Bug1: When the country not specified, lunch gives error.
- Bug2: When the specified country's meal wasn't prepared at that day, lunch gets empty

```
/bin/cp -f src/Controller/Meals2Controller.php src/Controller/MealsController.php
diff  src/Controller/Meals2Controller.php src/Controller/MealsController.php

/bin/cp -f src/Template/Meals/dashboard2.ctp src/Template/Meals/dashboard.ctp
diff  src/Template/Meals/dashboard2.ctp src/Template/Meals/dashboard.ctp

/bin/cp -f src/Template/Meals/request2.ctp src/Template/Meals/request.ctp
diff  src/Template/Meals/request2.ctp src/Template/Meals/request.ctp
```

- Main Code
  - MealsController
- Explain
  - Some bugfix code was added

### Version3 --- Dessert & Drink Introduction ---

```
/bin/cp -f src/Controller/Meals3Controller.php src/Controller/MealsController.php
diff  src/Controller/Meals3Controller.php src/Controller/MealsController.php

/bin/cp -f src/Template/Meals/dashboard3.ctp src/Template/Meals/dashboard.ctp
diff  src/Template/Meals/dashboard3.ctp src/Template/Meals/dashboard.ctp

/bin/cp -f src/Template/Meals/request3.ctp src/Template/Meals/request.ctp
diff  src/Template/Meals/request3.ctp src/Template/Meals/request.ctp
```

- Main Code
  - MealsController
- Explain
  - Dessert/Drink Feature was added

### More Requirements...

- Except GreenChili Option
  - Allow "Non Green Chili" option
- Sugar Option for Drink
  - Allow "Non Sugar" option
  - Each drink master data has `allow_sugar` attributes in the options column

### Version4 --- Refactor ---

```
/bin/cp -f src/Controller/Meals4Controller.php src/Controller/MealsController.php
diff  src/Controller/Meals4Controller.php src/Controller/MealsController.php

/bin/cp -f src/Template/Meals/dashboard4.ctp src/Template/Meals/dashboard.ctp
diff  src/Template/Meals/dashboard4.ctp src/Template/Meals/dashboard.ctp

/bin/cp -f src/Template/Meals/request4.ctp src/Template/Meals/request.ctp
diff  src/Template/Meals/request4.ctp src/Template/Meals/request.ctp
```

- Main Code
  - Entity and Table
  - MealOrganizer
- Explain
  - Meals/Dessert/Drink Table actually not exists but Create it because Model is for BusinessLogic 
  - Implement meal fetching feature on Meals/Dessert/Drink Table
  - Then, in order to pick proper meals according to the user preferences, 
    Create MealOrganizer class
  - Meal Organizer accepts user, meals, options arguments
    - user: user information
    - meals: alternatives of today's meals
    - options: user preferences of today( sent dat afrom form )
  - MealOrganizer is transparent against the parameters
  - MealOrganizer is Plain PHP class so it's easy to try
  - In the similar way, DessertOrganizer, DrinkOrganizer can be implemented
