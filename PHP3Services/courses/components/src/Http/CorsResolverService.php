<?php
namespace components\Http;

// https://stackoverflow.com/questions/8719276/cross-origin-request-headerscors-with-php-headers
// https://community.wappler.io/t/cors-cross-origin-warning-showing-up-in-a-php-project/39830/6

class CorsResolverService
{

    /**
     *  An example CORS-compliant method.  It will allow any GET, POST, or OPTIONS requests from any
     *  origin.
     *
     *  In a production environment, you probably want to be more restrictive, but this gives you
     *  the general idea of what is involved.  For the nitty-gritty low-down, read:
     *
     *  - https://developer.mozilla.org/en/HTTP_access_control
     *  - https://fetch.spec.whatwg.org/#http-cors-protocol
     *
     */
    function cors()
    {

        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
            // you want to allow, and if so:
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }

        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            exit(0);
        }

        echo "You have CORS!";
    }


    public function corsFirst()
    {
        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Methods: GET, POST');

        header("Access-Control-Allow-Headers: X-Requested-With");
    }


    public function corsSecond()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
            header('Access-Control-Allow-Headers: token, Content-Type');
            header('Access-Control-Max-Age: 1728000');
            header('Content-Length: 0');
            header('Content-Type: text/plain');
            die();
        }

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $ret = [
            'result' => 'OK',
        ];
        print json_encode($ret);
    }


    public function corsThree()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    }


    public function corsFour()
    {
        // Allow from any origin
        if (isset($_SERVER["HTTP_ORIGIN"])) {
            // You can decide if the origin in $_SERVER['HTTP_ORIGIN'] is something you want to allow, or as we do here, just allow all
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        } else {
            //No HTTP_ORIGIN set, so we allow any. You can disallow if needed here
            header("Access-Control-Allow-Origin: *");
        }

        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 600");    // cache for 10 minutes

        if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
            if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
                header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT"); //Make sure you remove those you do not want to support

            if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

            //Just exit with 200 OK with the above headers for OPTIONS method
            exit(0);
        }
        //From here, handle the request as it is ok
    }


    public function corsFive()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 1000");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
        header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
    }


    public function corsSix()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
    }


    public function corsSeven()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
        header("Access-Control-Max-Age", "3600");
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
        header("Access-Control-Allow-Credentials", "true");
    }


    /*
    public function corsSymfony()
    {
        use Fruitcake\Cors\CorsService;

        $cors = new CorsService([
            'allowedHeaders'         => ['x-allowed-header', 'x-other-allowed-header'],
            'allowedMethods'         => ['DELETE', 'GET', 'POST', 'PUT'],
            'allowedOrigins'         => ['http://localhost', 'https://*.example.com'],
            'allowedOriginsPatterns' => ['/localhost:\d/'],
            'exposedHeaders'         => ['Content-Encoding'],
            'maxAge'                 => 0,
            'supportsCredentials'    => false,
        ]);

        $cors->addActualRequestHeaders(Response $response, $origin);
        $cors->handlePreflightRequest(Request $request);
        $cors->isActualRequestAllowed(Request $request);
        $cors->isCorsRequest(Request $request);
        $cors->isPreflightRequest(Request $request);
    }
    */
}