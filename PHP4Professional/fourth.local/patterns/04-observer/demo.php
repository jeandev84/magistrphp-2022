<?php


# Наблюдаемый
abstract class Observable
{

    public function __construct(protected string $name)
    {
    }


    public function getName()
    {
        return $this->name;
    }

    abstract public function attach(Observer $observer);
    abstract public function detach(Observer $observer);
}


interface Notification
{

}



# Наблюдатель
abstract class Observer
{
    /**
     * @param string $name
    */
    public function __construct(protected string $name)
    {
    }



    /**
     * @param Observable $observable
     * @return string
    */
    public function update(Observable $observable)
    {
         return $this->getName() . " по имени {$this->getName()} написал: {$observable->getName()}";
    }


    /**
     * @return string
    */
    public function getName(): string
    {
         return $this->name;
    }
}



# Автор
class Author extends Observable
{

    /**
     * @var Observer[]
     */
    protected $observers = [];


    /**
     * @param Observer $observer
     * @return void
    */
    public function attach(Observer $observer)
    {
        $this->observers[$observer->getName()] = $observer;

        /* $this->observers[] = $observer; */
    }


    public function detach(Observer $observer)
    {
         unset($this->observers[$observer->getName()]);

         /*
         $this->observers = array_filter($this->observers, function ($element) use ($observer) {
             return ! ($element === $observer);
         });
         */
    }


    public function notify()
    {
        foreach ($this->observers as $observer) {
             echo $observer->update($this) ."\n";
        }
    }


    public function write(string $text)
    {
        echo "{$this->getName()} написал $text\n";
        $this->notify();
    }
}



# Читатель
class User extends Observer
{

    public function update(Observable $observable)
    {
        $message = parent::update($observable);
        $message .=  " великий писатель!";
        return $message;
    }
}



# Критик
class Critic extends Observer
{

    public function update(Observable $observable)
    {
        $message = parent::update($observable);
        $message .= " посредственный писатель...";
        return $message;
    }
}



# Историк
class Historian extends Observer
{

    public function update(Observable $observable)
    {
        $message = parent::update($observable);
        $message .= " не достоверный писатель, который попадёт в историю...";
        return $message;
    }
}



$author = new Author('А.С. Пушкин');

$user1     = new User('Иванов И.');
$user2     = new User('Петрова Н.А.');
$critic    = new Critic('Н.Н. Пушкин');
$historian = new Historian('Сумкина А.');


$author->attach($user1);
$author->attach($user2);
$author->attach($critic);
$author->attach($historian);

# $author->detach($critic);

$author->write('Стихотворение');



/*
А.С. Пушкин написал Стихотворение
Иванов И. по имени Иванов И. написал: А.С. Пушкин великий писатель!
Петрова Н.А. по имени Петрова Н.А. написал: А.С. Пушкин великий писатель!
Н.Н. Пушкин по имени Н.Н. Пушкин написал: А.С. Пушкин посредственный писатель...
Сумкина А. по имени Сумкина А. написал: А.С. Пушкин не достоверный писатель, который попадёт в историю...
*/