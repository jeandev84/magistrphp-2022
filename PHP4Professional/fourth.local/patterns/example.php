<?php

/**
 * Singleton
*/
class Config
{
     /**
      * @var array
     */
     protected array $parameters = [];


     /**
      * @var self
     */
     protected static $instance;


     private function __construct() {}
     private function __clone() {}


      /**
       * @return $this
     */
     public static function getInstance(): static
     {
          if (empty(static::$instance)) {
              static::$instance = new static();
          }

          return static::$instance;
     }


     /**
      * @param string $name
      * @param $value
      * @return $this
     */
     public function setParameter(string $name, $value): static
     {
         $this->parameters[$name] = $value;

         return $this;
     }



     /**
      * @param string $name
      * @return bool
     */
     public function hasParameter(string $name): bool
     {
          return isset($this->parameters[$name]);
     }



     /**
      * @param string $name
      * @param $default
      * @return mixed
     */
     public function getParameter(string $name, $default = null): mixed
     {
          return $this->parameters[$name] ?? $default;
     }



     /**
      * @return array
     */
     public function getParameters(): array
     {
        return $this->parameters;
     }
}


/**
 *  Factory Method
*/

abstract class Product
{
     /**
      * @return string
     */
     abstract public function getTitle(): string;
}



class PhoneProduct extends Product
{

      /**
       * @var string
      */
      protected string $title;



      /**
       * @param string $id
      */
      public function __construct(protected string $id)
      {

      }



      /**
       * @return string
      */
      public function getId(): string
      {
          return $this->id;
      }




      /**
       * @param string $title
       * @return $this
      */
      public function setTitle(string $title): static
      {
           $this->title = $title;

           return $this;
      }



      /**
       * @inheritDoc
      */
      public function getTitle(): string
      {
          return $this->title;
      }
}



abstract class Provider
{
    /**
     * @param $id
     * @return mixed
   */
    abstract public function create($id);
}


class CompanyProvider extends Provider
{
    /**
     * @param $id
     * @return PhoneProduct
    */
    public function create($id): PhoneProduct
    {
        return new PhoneProduct($id);
    }
}



/**
 * Strategy
*/

# Оплата
abstract class Payment
{
    abstract public function valuation(): int;
}


# Недвижимость
abstract class Estate
{
     protected $field;

     abstract public function valuation(): int;
}


# Квартира
class Flat extends Estate
{

    public function valuation(): int
    {
        // TODO: Implement valuation() method.
    }
}


# Дом
class Home extends Estate
{

    public function valuation(): int
    {
        // TODO: Implement valuation() method.
    }
}



# Оплата наличие
class CashPayment extends Payment
{

    public function valuation(): int
    {
        // TODO: Implement valuation() method.
    }
}



# Оплата в ипотеке
class MortgagePayment extends Payment
{

    public function valuation(): int
    {
        // TODO: Implement valuation() method.
    }
}



# Оплата в рассрочке
class InstallmentPayment extends Payment
{

    public function valuation(): int
    {
        // TODO: Implement valuation() method.
    }
}



/**
 * Decorator
*/

interface Component
{
     public function operation();
}



class ConcreteComponent implements Component
{
     public function operation()
     {

     }
}


class Decorator implements Component
{
    protected $operation;


    public function operation()
    {

    }
}


class ConcreteDecoratorA extends Decorator
{
     public function addedState()
     {

     }

     public function operation()
     {

     }
}



class ConcreteDecoratorB extends Decorator
{
     public function addedBehavior()
     {

     }


     public function operation()
     {
         // TODO: Implement operation() method.
     }
}



/**
 * Adapter
*/

interface Payments
{
    public function payment(float $payment);
}


class ClientPayments implements Payments
{

    public function payment(float $payment)
    {
        // TODO: Implement payment() method.
    }
}


class YandexPayments
{
    public function yandexPay(float $payment)
    {

    }
}


class YandexAdapterPayments implements Payments
{
     public function __construct(protected YandexPayments $pay)
     {
     }

     public function payment(float $payment)
     {
         $this->pay->yandexPay($payment);
     }
}