<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Product;
use App\Models\Filter;
use App\Models\FilterCategory;
use App\Models\ProductFilter;

class ProductsController extends Controller
{
    public function catalog(){
        $categories = Category::withCount('products')->get();

        return view('catalog', [
            'categories'=>$categories,
        ]);
    }
    public function cart(){
        return view('cart');
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->get();

        $productsJson = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'brand' => $product->brand,
                'type' => $product->type,
                'price' => $product->price,
                'image' => str_replace("\\", "/", json_decode($product->image, true)),
                // Добавьте другие необходимые поля
            ];
        })->toJson();

        $filtersCategory = FilterCategory::where("category_id", $category->id)->get();

        return view('products', [
            'category' => $category,
            'products' => $category->products()->paginate(15), // для отображения с пагинацией
            'filtersCategory' => $filtersCategory,
            'productsJson' => $productsJson, // данные для JS
        ]);
    }
    public function product($category, $slug){
        $category = Category::Where('slug', $category)->first();
        $product = Product::Where("slug", $slug)->first();
        
        $products = $category->products;

        $imagePath = $product->image;
        // Проверяем, является ли путь изображением JSON массивом
        
        $imagePath = json_decode($imagePath, true);

        $productFilters = ProductFilter::Where("product_id", $product->id)->get();
        $filterIds = $productFilters->pluck('filter_id')->unique();
        

        $filters = Filter::whereIn('id', $filterIds)->get();
        // dd($filters);


        return view('single-product', [
            'category'=>$category,
            'product'=>$product,
            'products'=>$products,
            'imagesPath'=>$imagePath,
            'filters'=>$filters,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->orWhere('brand', 'LIKE', "%{$query}%")
                            ->orWhereHas('category', function($q) use ($query) {
                                $q->where('name', 'LIKE', "%{$query}%");
                            })
                            ->paginate(15);

        return view('products_search', compact('products', 'query'));
    }


    public function filterProducts(Request $request)
    {
        $query = Product::query();
    
        // Фильтр по брендам
        if ($request->has('brands')) {
            $query->whereIn('brand', $request->brands);
        }
    
        // Фильтр по типам
        if ($request->has('types')) {
            $query->whereIn('type', $request->types);
        }
    
        // Фильтр по дополнительным фильтрам продуктов
        if ($request->has('filters')) {
            $query->whereHas('filters', function ($q) use ($request) {
                $q->whereIn('filters.id', $request->filters);
            });
        }
    
        $products = $query->get();
    
        return view('partials.products_cards', compact('products'));
    }
    

}
