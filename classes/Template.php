<?php 

class Template 
{
    protected $template;

    protected $params;
    
    public function __construct($template)
    {
        $this->template = $template;
    }

    public function __get($key)
    {
        return $this->params[$key];
    }

    public function __set($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function __toString()
    {
        extract($this->params);
        chdir(dirname($this->template));
        
        ob_start();

        include 'commons/header.php';

        include basename($this->template);

        include 'commons/footer.php';

        return ob_get_clean();
    }
}
