<?php


/**
 * @param array $categories
 * @return string
*/
function renderCategories(array $categories): string {

   $html = '';
   // $arr  = [];

   if (count($categories) > 0) {
       foreach ($categories as $category) {
           $html .= sprintf('<a class="dropdown-item" href="#">%s</a>', $category);
           // $arr[] = sprintf('<a class="dropdown-item" href="#">%s</a>', $category);
       }
   } else {
       $html .= '<p>элементов нет</p>';
       // $arr[] = '<p>элементов нет</p>';
   }

   // return implode($arr);

   return $html;
}