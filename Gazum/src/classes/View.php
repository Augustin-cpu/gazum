<?php

namespace Gazum\App\classes;

class View{
    private $template;
    private $datas;
    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function assign(array $params = []){
        if(is_array($params)){
            foreach($params as $key => $value)
            $this->datas[$key] = $value;
        }
    }
    public function render(): void{
        $template = $this->template;
        ob_start();
        if(isset($this->datas)){
            extract($this->datas);
        }
        if(file_exists(AUTH.$template.'.php')){
            require_once AUTH.$template.'.php';
            $contentpage = ob_get_clean();
            require_once AUTH.'layout.php';
        }else{
            require_once VIEW.$template.'.php';
            $contentpage = ob_get_clean();
            require_once VIEW.'layout.php';
        }
    }
    public function redirect(string $template): void{
        header('Location: ' . $template);
        exit();
    }
}