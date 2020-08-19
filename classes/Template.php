<?php 

class Template
{
    public function __toString()
    {
        return 'You are calling Template::__toString(). Call render() instead';
    }

    /**
     * @param string $template path to the template
     * @param array $params assoc. array with keys that the template expects
     *
     * @return false|string the template with filled in placeholders
     */
    public function render($template, $params = null)
    {
        chdir(dirname($template));

        ob_start();

        include 'commons/header.php';
        // $params will be used inside template
        include basename($template);
        include 'commons/footer.php';

        return ob_get_clean();
    }
}