<?php

abstract class Product
{
    abstract public function getTitle();
}


abstract class Provider
{
     abstract public function create(string $modelName);
}


class IPhoneProduct extends Product
{
    public function __construct(protected string $title)
    {
         echo __CLASS__, "<hr>", $this->title, "<hr/>";
    }


    /**
     * @inheritDoc
    */
    public function getTitle(): string
    {
         return $this->title;
    }
}



class IphoneCompanyProvider extends Provider
{

    /**
     * @param string $modelName
     * @return IPhoneProduct
    */
    public function create(string $modelName): IPhoneProduct
    {
         return new IPhoneProduct($modelName);
    }
}

$factory = new IphoneCompanyProvider();
$phone   = $factory->create('Модель 123Query');
echo $phone->getTitle();