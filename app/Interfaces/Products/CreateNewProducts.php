<?php

namespace App\Interfaces\Products;

Interface CreateNewProducts
{
    /**
     * Validate and create a new product.
     *
     * @param  array  $input
     * @return mixed
     */
    public function create(array $input);
}

?>
