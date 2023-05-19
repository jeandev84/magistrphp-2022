<?php
namespace App\Controllers;

use App\Entity\Book\Book;
use Specialist\Controller;


class CatalogController extends Controller
{

    public function index()
    {
        // создаем подготовлён запрос
        $statement = $this->app['db']->prepare('SELECT id, title, price FROM catalog WHERE price IS NOT NULL');
        $statement->execute();
        $statement->bind_result($idBook, $title, $price);

        $books = [];

        while ($statement->fetch()) {
            $books[$idBook] = new Book($title, $price);
        }

        return $this->render('catalog/index', [
            'page' => 'Каталог',
            'books'  => $books
        ]);
    }
}