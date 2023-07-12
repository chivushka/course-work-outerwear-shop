<?php

namespace app\widgets\menu;

use ishop\Cache;
use ishop\App;

class Menu{

    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'myishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function  __construct($options=[]){
        $this->tpl= __DIR__. '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach ($options as $k=>$v){
            if(property_exists($this,$k)){
                $this->$k = $v;
            }
        }
    }

    //формирование меню
    protected function run(){
        $cache = Cache::instance();
        $this->menuHtml = $cache ->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if(!$this->data){
                $this->data =\R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    //вывод меню
    protected function output(){
        $attrs='';
        if(!empty($this->attrs)){
            foreach ($this->attrs as $k=>$v){
                $attrs .= "$k = '$v'";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    //формирование древа меню из массива
    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach($data as $id=>&$node){
            //если возвращает 0
            //помещает главный родительский элемент в корень
            if(!$node['parent_id']){
                $tree[$id]=&$node;
            }else{ //добавляет ребёнка родительскому элементу
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    //стройка html-кода меню
    protected function getMenuHtml($tree,$tab=''){
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category,$tab,$id);
        }
        return $str;
    }

    protected function  catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}