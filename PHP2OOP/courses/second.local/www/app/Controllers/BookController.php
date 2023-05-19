<?php
namespace App\Controllers;

use App\Entity\Book\Book;
use Specialist\Controller;
use Specialist\Http\Request\Request;


class BookController extends Controller
{

    public function index()
    {
        return $this->render('book/index', [
            'page' => 'Книги'
        ]);
    }




    public function create(Request $request)
    {
        // $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        // $price = 0

        /* $title = $request->request->get('title'); */
        /* $bookName = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING); */
        $bookName = trim(strip_tags($request->request->get('title')));
        $bookPrice = $request->request->getInt('price');

        if (! $bookName) {
            //$request->sessions->addFlash('danger', 'Не указано название книги');
            $_SESSION['flash'][] = ['type' => 'danger', 'text' => 'Не указано название книги'];
        }


        if (! $bookPrice) {
            // $request->sessions->addFlash('danger', 'Не указано цена книги');
            $_SESSION['flash'][] = ['type' => 'danger', 'text' => 'Не указано цена книги'];
        }


        if ($bookName && $bookPrice) {

            /* $this->app['fs']->write('book.txt', "$title|$price"); */

            // создаем подготовлён запрос
            $statement = $this->app['db']->prepare('INSERT INTO catalog (title, price) VALUES(?, ?)');


            // связаваем переменные с запросом
            $statement->bind_param('si', $bookName, $bookPrice);



            // выполняем запрос
            $statement->execute();


            $_SESSION['flash'][] = ['type' => 'success', 'text' => 'Книга добавлена'];

            return $this->redirectTo('/');
        }


        $flash = $_SESSION['flash'] ?? '';
        unset($_SESSION['flash']);

        return $this->render('book/create', [
            'page' => 'Добавление книги',
            'bookName' => $bookName,
            'bookPrice' => $bookPrice,
            'messages' => $flash
        ]);
    }



    /*
    public function addbook()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $price = (float) $_POST['price'];
            file_put_contents('books.txt', "$title|$price\n", FILE_APPEND);
            $_SESSION['flash'] = 'Книгадобавлена';
            header('Location: /?action=addbook');
            die;
        }

        $flash = $_SESSION['flash'] ?? '';
        unset($_SESSION['flash']);

        return $this->render('form-add-book', [
            'title' => 'Добавление книги',
            'message' => $flash
        ]);
    }
    */
}

/*
mysql> show databases;
+------------------------+
| Database               |
+------------------------+
| apiplatform            |
| doctrineorm            |
| ecommerce_mini_project |
| eshoprmq               |
| information_schema     |
| lexus                  |
| mysql                  |
| performance_schema     |
| products_api           |
| products_api_test      |
| shop                   |
| specialist_oop_eshop   |
| symfony                |
| sys                    |
| videos                 |
+------------------------+
15 rows in set (0,00 sec)

mysql> use specialist_oop_eshop;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+--------------------------------+
| Tables_in_specialist_oop_eshop |
+--------------------------------+
| catalog                        |
| orders                         |
+--------------------------------+
2 rows in set (0,00 sec)

mysql> describe catalog;
+---------+--------------+------+-----+-------------------------+----------------+
| Field   | Type         | Null | Key | Default                 | Extra          |
+---------+--------------+------+-----+-------------------------+----------------+
| id      | int          | NO   | PRI | NULL                    | auto_increment |
| title   | varchar(255) | NO   |     | Без названия            |                |
| author  | varchar(255) | YES  |     | NULL                    |                |
| pubyear | int          | YES  |     | NULL                    |                |
| price   | int          | YES  |     | NULL                    |                |
+---------+--------------+------+-----+-------------------------+----------------+
5 rows in set (0,02 sec)

mysql> desc orders;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int          | NO   | PRI | NULL    | auto_increment |
| title    | varchar(255) | NO   |     |         |                |
| author   | varchar(255) | NO   |     |         |                |
| pubyear  | int          | YES  |     | NULL    |                |
| price    | int          | YES  |     | NULL    |                |
| quantity | int          | NO   |     | 1       |                |
| orderid  | varchar(50)  | NO   |     |         |                |
| datetime | int          | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
8 rows in set (0,00 sec)

mysql>

*/