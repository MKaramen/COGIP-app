<?php declare(strict_types=1);


/**
 * Base Controller class 
 */
class Controller 
{

    /* Load Model */
    protected function model(string $model)
    {
        return new $model();             // instantiate model
    }

    /* Load view */
    public function view(string $view, array $dataInfo=[], array $dataModel=[]): void
    {
        Helper::view($view, $dataInfo, $dataModel);     // require view file
    }

    /**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class.
     */
    public function __call(string $method, array $args)
    {
        if (!method_exists($this, $method)) throw new Exception('Method '.$method.' not found in controller '.__CLASS__);

        if ($this->before()) 
        {
            call_user_func_array(array($this, $method), $args);
            $this->after();
        } 
    }

    /* Before filter - called before an action method */
    protected function before(): bool
    {
        return True;
    }

    /* After filter - called after an action method */
    protected function after() {}
} 