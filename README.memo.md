
## Test

http://bd-lunch.rv-php5.6.net/

```
cd /vagrant/shared/bd-lunch

php -a
bin/cake console
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

### Version3 --- Dessert & Drink Introduction ---

```
/bin/cp -f src/Controller/Meals3Controller.php src/Controller/MealsController.php
diff  src/Controller/Meals3Controller.php src/Controller/MealsController.php

/bin/cp -f src/Template/Meals/dashboard3.ctp src/Template/Meals/dashboard.ctp
diff  src/Template/Meals/dashboard3.ctp src/Template/Meals/dashboard.ctp

/bin/cp -f src/Template/Meals/request3.ctp src/Template/Meals/request.ctp
diff  src/Template/Meals/request3.ctp src/Template/Meals/request.ctp
```
