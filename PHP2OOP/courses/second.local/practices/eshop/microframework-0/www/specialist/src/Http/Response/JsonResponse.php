<?php
namespace Specialist\Http\Response;

class JsonResponse extends Response
{


      /**
       * @param array $data
       * @param int $status
       * @param array $headers
      */
      public function __construct(array $data, int $status = 200, array $headers = [])
      {
           $headers = array_merge(['Content-Type', 'application/json'], $headers);

           parent::__construct(json_encode($data), $status, $headers);
      }
}