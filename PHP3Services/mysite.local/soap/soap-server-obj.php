<?php
require_once "../news/NewsDB.class.php";
require_once "../news/News.class.php";
class NewsServiceObj extends NewsDB{
	/* Метод возвращает новость по её идентификатору */
	function getNewsById($id){
		try{
			$sql = "SELECT id, title, 
					(SELECT name FROM category WHERE category.id=msgs.category) as category, description, source, datetime 
					FROM msgs
					WHERE id = $id";
			$result = $this->_db->query($sql);
			if (!is_object($result)) 
				throw new Exception($this->_db->lastErrorMsg());
			else {
				$n = $result->fetchArray(SQLITE3_ASSOC) ;
				return new News($n['id'], $n['title'], $n['description'], $n['datetime']);
				
			}
		}catch(Exception $e){
			throw new SoapFault('getNewsById', $e->getMessage());
		}
	}
}

/*
$client = new  NewsServiceObj();

// Покажем конкретную новость
$result = $client->getNewsById(2);
var_dump($result);
*/

// Отключение кеширования wsdl-документа
ini_set("soap.wsdl_cache_enabled", "0");

// Создание SOAP-сервера
$server = new SoapServer("http://localhost/soap/news-obj.wsdl");
// Регистрация класса
$server->setClass("NewsServiceObj");
// Запуск сервера
$server->handle();


?>

