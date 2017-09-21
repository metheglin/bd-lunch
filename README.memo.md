
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

```
$Users  = \Cake\ORM\TableRegistry::get('Users');
$Meals  = \Cake\ORM\TableRegistry::get('Meals');
$organizer = new \App\Model\Service\MealOrganizer($Users->get(1), 
    $Meals->getTodayMenu(),
    [
      "country" => "BD", 
      "meal_nonchili" => true,
    ]
);
$organizer->getMain();
$organizer->getSub();
$organizer->mealCountry();
```

```
$Users  = \Cake\ORM\TableRegistry::get('Users');
$Meals  = \Cake\ORM\TableRegistry::get('Meals');

$dataset = [
  [
      'weekday' => 4,
      'name' => 'khichuri',
      'kind' => 'main',
      'country' => 'BD',
      'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
  ],
  [
      'weekday' => 4,
      'name' => 'haleem',
      'kind' => 'main',
      'country' => 'BD',
      'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
  ],
  [
      'weekday' => 4,
      'name' => 'sushi',
      'kind' => 'main',
      'country' => 'JP',
      'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
  ],
  [
      'weekday' => 4,
      'name' => 'yakisoba',
      'kind' => 'main',
      'country' => 'JP',
      'isactive' => '1', 'isdel' => NULL, 'modified_by' => NULL, 'created_by' => NULL, 'modified' => '2017-06-20 08:29:59', 'created' => '2017-06-19 04:56:54',
  ],
];

$organizer = new \App\Model\Service\MealOrganizer($Users->get(1), 
    array_map(function($x){
      return new \App\Model\Entity\Meal($x);
    }, $dataset),
    [
      "country" => "BD", 
      "meal_nonchili" => true,
    ]
);
$organizer->getMain();

$organizer = new \App\Model\Service\MealOrganizer($Users->get(1), [],
    [
      "country" => "BD", 
      "meal_nonchili" => true,
    ]
);
$organizer->mealCountry();
```


