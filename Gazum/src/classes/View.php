<?php

namespace Gazum\App\classes;

class View{
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function render(array $params = []){
        $template = $this->template;
        ob_start();
        extract($params);
        require_once VIEW.$template.'.php';
        $contentpage = ob_get_clean();
        require_once VIEW.'layout.php';
    }
}