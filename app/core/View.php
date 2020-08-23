<?php


class View
{
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function render($parameters = array())
    {
        if (file_exists(VIEW . $this->view . '.php')) {
            extract($parameters);

            // $view is included inside header_footer.php
            include VIEW . 'header_footer.php';
        }
    }
}