<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Products
 *
 * Managing Products
 */
class ProductController extends Controller
{
    /**
     * Get Products
     *
     * List all the products
     *
     * @queryParam page Which page to show. Example: 25
     *
     * @response status=200 {
     *       "data": [
     *            {
     *                 "id": 1,
     *                 "category_id": "3",
     *                 "name": "Product 1",
     *                 "price": "810.22",
     *                 "category": {
     *                      "id": 3,
     *                      "name" "Category 3",
     *                      "created_at": "2021-02-25T20:17:16.000000Z"
     *            },
     *            {
     *                 "id": 2,
     *                 "category_id": "4",
     *                 "name": "Product 2",
     *                 "price": "429.81",
     *                 "category": {
     *                      "id": 4,
     *                      "name" "Category 4",
     *                      "created_at": "2021-02-25T20:17:16.000000Z"
     *            },
     *                 *            {
     *                 "id": 3,
     *                 "category_id": "1",
     *                 "name": "Product 3",
     *                 "price": "429.81",
     *                 "category": {
     *                      "id": 1,
     *                      "name" "Category 1",
     *                      "created_at": "2021-02-25T20:17:16.000000Z"
     *            },
     *                *            {
     *                 "id": 4,
     *                 "category_id": "3",
     *                 "name": "Product 4",
     *                 "price": "215.81",
     *                 "category": {
     *                      "id": 3,
     *                      "name" "Category 3",
     *                      "created_at": "2021-02-25T20:17:16.000000Z"
     *            },
     *        ]
     * }
     *
     *
     * @response status=404 {
     * "message": "Not found"
     * }
     */
    public function index()
    {
        $products = Product::with('category')->paginate(6);

        return ProductResource::collection($products);
    }
}
