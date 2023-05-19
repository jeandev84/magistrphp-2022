<?php
namespace App\Controllers;

use App\View\View;
use App\Controllers\BaseController;
use App\Models\Book;

class IndexController extends BaseController
{

  public function index()
  {
    global $connection;
    $titlePage = 'Каталог';

    $sql = 'SELECT id, title, price FROM catalog WHERE price IS NOT NULL';
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($idBook, $title, $price);

    $books = [];
    while( $stmt->fetch() ){
      $books[$idBook] = new Book($title, $price);
    }

    return $this->render('index', [
      'titlePage' => $titlePage,
      'books' => $books
    ]);
  }

  public function addbook()
  {
    global $connection;
    $titlePage = 'Добавление книги';    

    $title = '';
    $price = 0;

    if( $_SERVER['REQUEST_METHOD'] == 'POST'  ){
      $title = trim(strip_tags($_POST['title']));
      $price = (float) $_POST['price'];

      if( !$title ){
        $_SESSION['flash'][] = ['type' => 'danger', 'text' => 'Не указано название книги'];
      }
      if( !$price ){
        $_SESSION['flash'][] = ['type' => 'danger', 'text' => 'Не указана цена книги или она равна нулю'];
      }

      if($title && $price){
        
        //file_put_contents('books.txt', "$title|$price\n", FILE_APPEND);

        //создаём подготовленный запрос
        $sql = 'INSERT INTO catalog (title, price) VALUES (?, ?)';
        $stmt = $connection->prepare($sql);

        //связаваем переменные с запросом
        $stmt->bind_param('si', $title, $price);

        //выполняем запрос
        $stmt->execute();

        $_SESSION['flash'][] = ['type' => 'success', 'text' => 'Книга добавлена'];
        header('Location: /addbook');
        die;
      }
 
    }

    $flash = $_SESSION['flash'] ?? '';
    unset($_SESSION['flash']);

    return $this->render('addBookForm', [
      'titlePage' => $titlePage,
      'messages' => $flash,
      'title' => $title,
      'price' => $price,
    ]);
  }

}