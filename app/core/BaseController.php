<?php


abstract class BaseController
{
    /**
     * @property View
     */
    protected $view;

    /**
     * @param string $view
     * @return View
     */
    public function view($view)
    {
        $this->view = new View($view);
        return $this->view;
    }
}