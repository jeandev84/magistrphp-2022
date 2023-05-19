<?php
namespace App\Controllers;

use App\View\View;
use App\Controllers\BaseController;

class BasketController extends BaseController
{

  public function index()
  {
    global $connection;
    $titlePage = 'Корзина';

    $basket = $_SESSION['basket'];

    $keys = array_keys($basket);
    $keys = implode(',', $keys);

    $sql = 'SELECT id, title, price FROM catalog WHERE id IN ('. $keys.')';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $books = [];
    
    foreach($rows as $book){
      $books[] = [
        ...$book,
        'qty' => $basket[$book['id']],
      ];
    }    
 
    return $this->render('basket', [
      'titlePage' => $titlePage,
      'books' => $books,
    ]);
  }

  public function addbasket()
  {
    $idBook = (int) $_GET['id'];

    $_SESSION['basket'][$idBook]++;

    header('Location: /');
    die;
  }

  public function deletefrombasket()
  {
    
    header('Location: /basket');
    die;
  }

}