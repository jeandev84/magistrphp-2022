<?php

/**
 * Создать в файл form_reflection.php
 *
 * $reflection = new ReflectionClass(LoginForm::class);
 * $properties = $reflection->getProperties();
 * $propertyDoc = "Form\Types\Text"
 * $propertiesDoc = [];
 *
 * foreach($properties as $property) {
 *   $propertyDoc = "Form\Types\Text";
 *   if(preg_match("^$property->getDocComment()$", "Form\Types\Text", $matches)) {
 *      $propertiesDoc[] = [$propertyDoc->getName(), $propertyDoc->getValue()];
 *   }
 * }
 *
*/

require __DIR__.'/../LoginForm.php';

/**
 * Используя Reflection API на основе класса LoginForm
 * построить HTML-форму с нужными полями.
*/