<?php


function entity($method, $urlData, $formData) {
	$db = new NewsDB();
	header("Access-Control-Allow-Origin: *"); //CORS
	header("Content-Type: application/json; charset=UTF-8");    
	
    // GET /news
    if ($method === 'GET' && count($urlData) === 0) {
		echo json_encode($db->getNews());
        return;
    }
	
    // GET /news/{newsId}
    if ($method === 'GET' && count($urlData) === 1) {
        $newsId = $urlData[0];
		$n = $db->getNewsById($newsId);

        echo json_encode(new News($n['id'], $n['title'], $n['description'], $n['datetime']));
        return;
    }


    // POST /news
    if ($method === 'POST' && empty($urlData)) {

        $n = json_decode( $formData, true );
		$newsId = $db->saveNews($n['title'],$n['category'],$n['description'],$n['source']);
		
		// вернуть id, или uri, или сохраненный объект
		//echo $newsId;
		
		$n = $db->getNewsById($newsId);
        echo json_encode(new News($n['id'], $n['title'], $n['description'], $n['datetime']));
        return;
    }


    // PUT /news/{newsId}
    if ($method === 'PUT' && count($urlData) === 1) {
        // Получаем id 
        $newsId = $urlData[0];
        $n = json_decode( $formData, true );

        // Обновляем все поля новости в базе...
		$newsId = $db->updateNews($newsId, $n['title'],$n['category'],$n['description'],$n['source']);

        // Выводим ответ клиенту
		$n = $db->getNewsById($newsId);
        echo json_encode(new News($n['id'], $n['title'], $n['description'], $n['datetime']));

        return;
    }


    // DELETE /news/{newsId}
    if ($method === 'DELETE' && count($urlData) === 1) {
        // Получаем id новости
        $newsId = $urlData[0];

		echo json_encode(array(
			'success' => $db->deleteNews($newsId)
		));
        return;
    }


    // Возвращаем ошибку
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
    ));

}
