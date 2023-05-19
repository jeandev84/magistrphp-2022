<?php

/**
 * http://www.php.net/manual/ru/book.reflection.php
*/

require __DIR__."/classes.php";



/**
 * Reflection class
*/
$reflection = new ReflectionClass(Some::class);
pretty($reflection->getName());
pretty($reflection->getConstants());
pretty($reflection->getConstant('pi'));
pretty($reflection->getConstructor());
pretty($reflection->getDefaultProperties());
pretty($reflection->getDocComment());
pretty($reflection->getEndLine());
pretty($reflection->getFileName());
pretty($reflection->getInterfaceNames());
pretty($reflection->getInterfaces());
pretty($reflection->getInterfaces()[Foo::class]->getDocComment());
pretty($reflection->getMethod("someFunc"));
pretty($reflection->getMethod("someFunc")->getParameters());
pretty($reflection->getMethod("someFunc")->getDocComment());
pretty($reflection->getMethods());
pretty($reflection->isAbstract());
pretty($reflection->isAnonymous());
pretty($reflection->isInstance(new SomeOtherClass()));
pretty($reflection->implementsInterface(Foo::class));
pretty($reflection->isCloneable());
pretty($reflection->isInternal());


pretty($some = $reflection->newInstance());
pretty($some = $reflection->newInstanceArgs([79098006485]));
echo $some->someFunc([], 12);


/**
 * Reflection method из отражения Some
*/
$methods = $reflection->getMethods();

$props = [
    'isAbstract',
    'isConstructor',
    'isDestructor',
    'isFinal',
    'isPrivate',
    'isProtected',
    'isPublic',
    'isStatic'
];

foreach ($methods as $method) {
    echo "<h2>{$method->getName()}</h2>";
    echo "<ul>";
    foreach ($props as $prop) {
       echo "<li>$prop: ". ($method->{$prop} ? 'Да' : 'Нет') ."</li>";
    }
    echo "</ul>";
}

/**
 * Лабораторная работа
*/

