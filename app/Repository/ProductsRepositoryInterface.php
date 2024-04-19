<?php

namespace App\Repository;

use App\Models\Products;
use Illuminate\Support\Collection;

interface ProductsRepositoryInterface
{
   public function all(): Collection;

   public function randomProducts(): Collection;
}