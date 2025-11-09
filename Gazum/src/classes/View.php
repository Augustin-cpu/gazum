<?php

namespace Gazum\App\classes;

class View{
    private $template;
    private $datas;
    public function __construct($template = null)
    {
        $this->template = $template;
    }

    public function assign(array $params = []){
        foreach($params as $key => $value)
            $this->datas[$key] = $value;
    }
    public function render(){
        $template = $this->template;
        ob_start();
        extract($this->datas);
        require_once VIEW.$template.'.php';
        $contentpage = ob_get_clean();
        require_once VIEW.'layout.php';
    }
    public function redirect($template){
        header('Location :'.$template);
        exit;
    }
}