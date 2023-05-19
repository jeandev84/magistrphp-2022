<?php


interface Render
{
    public function render(array $data): string;
}


class XmlRender implements Render
{

    public function render(array $data): string
    {
        $format = "<?xml>";
        foreach ($data as $key => $value) {
            $format .= "<$key>$value</$key>";
        }
        return $format;
    }
}


class JsonRender implements Render
{

    public function render(array $data): string
    {
         return json_encode($data, JSON_PRETTY_PRINT);
    }
}


class HTMLRender implements Render
{

    public function __construct(protected string $class)
    {
    }

    public function render(array $data): string
    {
        $html = "<div class='{$this->class}'>";
        foreach ($data as $key => $value) {
            $html .= "<div class='$key'>$value</div>";
        }
        $html .= "</div>";
        return $html;
    }
}

abstract class Product
{
    public function __construct(protected string $title, protected float $price, protected Render $render)
    {
    }


    public function render(): string
    {
         return $this->render->render([
             'title' => $this->title,
             'price' => $this->price
         ]);
    }
}


class PhoneProduct extends Product
{

}


/** @var Render[] $renders */
$renders = [
    new XmlRender(),
    new JsonRender(),
    new HTMLRender('something')
];

foreach ($renders as $render) {
    $product = new PhoneProduct('Iphone 5', 34000, $render);
    echo $product->render();
}


