<?php
class BaseController
{
    public $requestMethod = '';
    public $arrQueryStringParams = '';
    /**
     * __call magic method.
     */
    public function __construct()
    {
      $this->requestMethod =  $_SERVER["REQUEST_METHOD"];
      $this->arrQueryStringParams = $this->getQueryStringParams();
    }

    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
 
    /**
     * Get URI elements.
     * 
     * @return array
     */
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
 
        return $uri;
    }
 
    /**
     * Get querystring params.
     * 
     * @return array
     */
    protected function getQueryStringParams()
    {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
 
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function responseJson($data, $codeHttp=200)
    {
        header_remove('Set-Cookie');
        $httpHeaders = $this->codeHttp($codeHttp);
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
        echo json_encode($data);
        exit;
    }
    
    private function codeHttp($code){
        $httpCode = null; 
        switch($code){
            case 200:
                $httpCode = 'HTTP/1.1 200 OK';
                break;
                case 500:
                    $httpCode = 'HTTP/1.1 500 Internal Server Error';
                    break;
                case 422:
                    $httpCode = 'HTTP/1.1 422 Unprocessable Entity';
                    break;
                case 201:
                    $httpCode = 'HTTP/1.1 201 Created';
                    break;
                case 400:
                    $httpCode = 'HTTP/1.1 400 Bad Request';
                    break;
                case 401:
                    $httpCode = 'HTTP/1.1 401 Unauthorized';
                    break;
                case 405:
                    $httpCode = 'HTTP/1.1 405 Method Not Allowed';
                    break;
                
        }
        return array('Content-Type: application/json', $httpCode);
    }
}