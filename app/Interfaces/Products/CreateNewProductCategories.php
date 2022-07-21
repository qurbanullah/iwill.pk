<?php

namespace App\Interfaces\Products;

Interface CreateNewProductCategories
{
    /**
     * Validate and create a new product category.
     *
     * @param  array  $input
     * @return mixed
     */
    public function create(array $input);
}

?>
