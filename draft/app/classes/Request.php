<?php declare(strict_types=1);


class Request
{
    /**
     * Returns all request that we are interested in
     * @param $is_array
     */
    public static function all(bool $is_array=true): array {
        $result = array();
        if (count($_GET) > 0)  $result['get'] = $_GET;
        if (count($_POST) > 0) $result['post'] = $_POST;
        $result['file'] = $_FILES;

        return json_decode(json_encode($result), $is_array);
    }

    /**
     * Returns a specific request data
     * @param $key
     */
    public static function get(string $key): array {
        $obj = new static();
        $data = $obj->all(true);

        return $data[$key];
    }

}