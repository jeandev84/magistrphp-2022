<?php
namespace App\Controllers;

use App\Entity\Book\Book;
use Specialist\Controller;
use Specialist\Http\Request\Request;
use Specialist\Http\Response\RedirectResponse;
use Specialist\Http\Response\Response;


class BasketController extends Controller
{


    /**
     * @return Response
    */
    public function index(): Response
    {
        $basket = $_SESSION['basket'];

        $books = [];

        if($keys = array_keys($basket)) {

            $idsBook = implode(',', $keys);

            $sql = 'SELECT id, title, price FROM catalog WHERE id IN ('.  $idsBook  . ')';
            $result = $this->app['db']->query($sql);
            $rows   = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($rows as $book) {

                /*
                $books[] = [
                    'id' => $book['id'],
                    'title' => $book['title'],
                    'price' => $book['price'],
                    'qty'   => $basket[$book['id']]
                ];
                */

                $books[] = [
                    ...$book,
                    'qty'   => $basket[$book['id']],
                ];
            }
        }


        return $this->render('basket/index', [
            'page' => 'Корзина',
            'books' => $books
        ]);
    }




    /**
     * @param Request $request
     * @return
    */
    public function add(Request $request)
    {
         $idBook = $request->queries->getInt('id');

         if (! isset($_SESSION['basket'][$idBook])) {
             $_SESSION['basket'][$idBook] = 1;
         } else {
             $_SESSION['basket'][$idBook]++;
         }

         /* $_SESSION['basket'][$idBook] = $_SESSION['basket'][$idBook] + 1; */
         /* $_SESSION['basket'][$idBook]++; */

         return $this->redirectTo('/');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
    */
    public function delete(Request $request)
    {
         $idBook = $request->queries->getInt('id');

         if (isset($_SESSION['basket'][$idBook])) {
              unset($_SESSION['basket'][$idBook]);
         }

         return $this->redirectTo('/basket');
    }
}