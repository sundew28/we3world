<?php

namespace App\Repository\Eloquent;

use App\Models\Products;
use App\Repository\ProductsRepositoryInterface;
use Illuminate\Support\Collection;

class ProductsRepository extends BaseRepository implements ProductsRepositoryInterface
{

   /**
    * ProductsRepository constructor.
    *
    * @param Products $model
    */
   public function __construct(Products $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

   /**
    * @return Collection
    */
   public function randomProducts(): Collection
   {
       return $this->model->inRandomOrder()
                ->limit(5)
                ->get();
   }
}