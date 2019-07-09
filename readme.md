# Design Patterns in PHP #
## Decorator Pattern ##
Use a common interface to create classes that change and adjust behaviour based on how they are used.

Define your interface:
```php
interface CarService {
    public function getCost();
    public function getDescription();
}
```

implement a base class:
```php
class BasicInspection implements CarService {

    public function getCost()
    {
        return 20;
    }

    public function getDescription()
    {
        return 'A basic inspection.';
    }


}
```

and then add more classes that extend the functionality of the base class. Notice how we are injecting and type hinting
the expected object that implements the `CarService` interface. The value from the base class is then added to:
```php
class OilChange implements CarService {

    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


    public function getCost()
    {
        return 35 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' And change that oil!';
    }


}
```

Use this like so:
```php
$service = new OilChange(new BasicInspection);
```

And keep on wrapping as you need to!

## Adapter Pattern ##
It's like an international plug adapter. It helps two things connect.

Similarly, an adapter here will allow us to translate one interface to another.

Create a class that takes the object you want to convert and implements the interface of the object you are converting to. 
Specify how each of the methods map to the new class. Use the adapter in place of the original object.

The class that takes the object we want to convert but implements the interface of the object we are converting to:
```php
class eReaderAdapter implements BookInterface
{

    private $reader;

    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }

}
```
Notice how each of the methods map to the new class. Next, use the adapter:
```php
(new Person)->read(new eReaderAdapter(new Nook()));
```

## Template Methods Pattern ##
It helps reduce code duplication. Ever found yourself copying and pasting an entire class and then renaming bits? 
It's for that!

We use an abstract class to reuse all the stuff that stays the same and then just override what needs to change.
All our (now) subclasses merely extend the duplicate functionality.

We can use an abstract method in our abstract class to force our sub classes to implement certain functionality that we 
cannot duplicate.

## Strategy Pattern ##
The strategy pattern defines a family of algorithms, encapsulates them and makes them interchangeable.

1. Define a family of algorithms
2. Encapsulate each member and make them interchangeable
3. Use them in context

This separates the context from the member. Meaning the member can changed easily.

Code to the interface!

## Specification Pattern ##
This allows us to take any kind of business and make it a first class citizen.

For example "A customer can be a gold subscriber".

Let's take the concept of being a gold subscriber literally and name our class:

```php
class CustomerIsGold implements CustomerSpecification {

    public function isSatisfiedBy(Customer $customer)
    {
        $customer->type == 'gold';
        // This can be as complex as it needs to be.
    }

}
```

The idea is that we apply the concept to any customer object with the logic for working out if the customer is gold in 
this class.

Try running the tests with `vendor/bin/phpunit --colors tests`

In the example in the folder...

A customer is an Eloquent model. Customers have a name and a type. The type property is encapsulated with the `getType()` 
function.

The piece of functionality we know we will often want to use is to know if a customer is a gold subscriber or not. This can 
be achieved with a function from within the model but if the logic starts getting really complicated, we could opt to create 
a `CustomerIsGold` class to be treated as a specification.

The specification contains the a function that takes a `Customer` object and returns their type.

To be able to access (n) number of customers, we create a `CustomerRepository` class. The responsibility of this class is 
to return all customers or those who match a given specification.

Tests are then used to show that each part of the set up works.
