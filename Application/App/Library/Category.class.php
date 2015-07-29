<?php

/**
 * 分类
 */
class Category
{
    private $CategoryModel;

    function __construct()
    {
        $this->CategoryModel = D('category');
    }

}