<?php

namespace App\Http\Controllers\API\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repository\ProductsRepositoryInterface;

/**
 * Single action controller in use to keep the code clean , scable and easy to maintain. I have use the repository design 
 * pattern to seperate the business logic and data layer. An abstract layer is placed in between.
 * 
 */
class ListProducts extends Controller
{

    /**
     * Inject our Products interface into the constructor with promoted properties
     */
    public function __construct(private ProductsRepositoryInterface $productsRepository)
    {
       
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Usage of "rescue" function of laravel instead of try - catch        
        return rescue(
            fn () => $this->productsRepository->randomProducts(), 
            "No products found.",
            true
        );
    }
}
