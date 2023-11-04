<?php

use App\Models\Category;

function getHeaderCategories(){
    $categories = Category::with('children')->header()->select('id', 'title', 'slug')->get();
    return $categories;
}

function getTopCategories(){
    $categories = Category::with('children')->top()->select('id', 'title', 'slug')->get();
    return $categories;
}

function getCategories($limit = null){
    $query = Category::active();
    if($limit){
        $query->limit($limit);
    }
    $categories = $query->inRandomOrder()->select('title', 'slug')->get();
    return $categories;
}
