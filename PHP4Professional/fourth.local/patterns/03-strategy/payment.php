<?php

# https://ru.wikipedia.org/wiki/Ипотека


# Расчет нашей движимости
abstract class Payment
{
    /**
     * @param int $price
     * @return float
    */
    abstract public function valuation(int $price): float;
}


# Оплата наличие
class CashPayment extends Payment
{

    public function valuation(int $price): float
    {
        return $price;
    }
}



# Оплата в ипотеке
class MortgagePayment extends Payment
{

    /**
     * Первый внос
     *
     * @var float
    */
    protected float $firstPayment;



    /**
     * Величина процентной ставки за период (в долях)
     *
     * @var int
    */
    protected int $percentDeposit;



    /**
     * Количество лет
     *
     * @var int
    */
    protected int $numberYears;



    /**
     * @param int $firstPayment
     * @param int $percentDeposit
     * @param int $numberYears
     */
    public function __construct(int $firstPayment, int $percentDeposit, int $numberYears)
    {
         $this->setFirstPayment($firstPayment);
         $this->setPercentDeposit($percentDeposit);
         $this->setNumberYears($numberYears);
    }


    /**
     * @param int $firstPayment
     */
    public function setFirstPayment(int $firstPayment): void
    {
        $this->firstPayment = $firstPayment;
    }


    /**
     * @return int
    */
    public function getFirstPayment(): int
    {
        return $this->firstPayment;
    }



    /**
     * @param int $percentDeposit
     */
    public function setPercentDeposit(int $percentDeposit): void
    {
        # 1200 = 12 месяцев * 100 долларов
        $this->percentDeposit = ($percentDeposit / 1200);
    }


    /**
     * @return int
    */
    public function getPercentDeposit(): int
    {
        return $this->percentDeposit;
    }




    /**
     * @param int $numberYears
    */
    public function setNumberYears(int $numberYears): void
    {
        # 12 месяцев * (на сколько лет клиент хочет брать ипотеку ?)
        $this->numberYears = $numberYears * 12;
    }




    /**
     * @return int
    */
    public function getNumberYears(): int
    {
        return $this->numberYears;
    }


    /**
     * Ипотечный расчет
     *
     *  https://php.net/manual/en/function.is-infinite.php
     *
     * @param int $price
     * @return float
    */
    public function valuation(int $price): float
    {
         # $price -= $this->firstPayment;
         $price   = $price - $this->firstPayment;
         # $percent = (1 - pow(1 + $this->percentDeposit, -$this->numberYears));
         $percent = 1 - ((1 + $this->percentDeposit) / $this->numberYears);

         if ($percent == 0) {
             throw new DivisionByZeroError();
         }

         return $this->firstPayment + ceil($this->numberYears * ($this->percentDeposit * $price / $percent));
    }
}



# Оплата в рассрочке
class InstallmentPayment extends Payment
{

    /**
     * Формула рассрочки надо искать
     *
     * @param int $price
     * @return float
     */
    public function valuation(int $price): float
    {
        return ceil($price * 1.1);
    }
}



# Недвижимость
abstract class Estate
{
    protected string $address;
    protected float $price;
    protected $strategy;


    /**
     * @param string $address
     * @param int $price
     * @param Payment $strategy
   */
    public function __construct(string $address, int $price, Payment $strategy)
    {
        $this->address = $address;
        $this->price   = $price;
        $this->strategy = $strategy;
    }


    /**
     * @return string
    */
    public function getAddress(): string
    {
        return $this->address;
    }



    /**
     * @return float
    */
    public function getPrice(): float
    {
        return $this->price;
    }



    /**
     * @return Payment
    */
    public function getStrategy(): Payment
    {
        return $this->strategy;
    }


    /**
     * @return int
    */
    public function valuation(): int
    {
         return $this->strategy->valuation($this->price);
    }
}



# Квартира
class Flat extends Estate {}


# Дом
class Home extends Estate {}


# 5e6: 5 millions
# 1e6: 1 million
$payment = new MortgagePayment(1e6, 9, 10);
$flat = new Flat('г.Москва, ул. Пушкина, район Колотушккино', 5e6, $payment);
// echo $flat->valuation()."\n";

$strategies = [
    new CashPayment(),
    new MortgagePayment(1e6, 9, 10),
    new  InstallmentPayment()
];

foreach ($strategies as $strategy) {
    $flat = new Home('г.Санкт-Петербург', 3e6, $strategy);
    echo $flat->valuation()."\n";
}