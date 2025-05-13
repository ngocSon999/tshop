<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Impl\CategoryServiceInterface;
use App\Http\Services\Impl\ProductServiceInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected CategoryServiceInterface $categoryService;
    protected ProductServiceInterface $productService;

    public function __construct(
        CategoryServiceInterface $categoryService,
        ProductServiceInterface $productService
    )
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->paginate(12);

        return view('frontend.index', compact( 'products'));
    }

    public function productByCategory($id)
    {
        $products = $this->productService->findByCategory($id);
        $category = $this->categoryService->findById($id);

        return view('frontend.category', compact( 'products', 'category'));
    }

    public function productDetail($id)
    {
        $product = $this->productService->findById($id);

        return view('frontend.product_detail', compact( 'product'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function postContact(Request $request)
    {
        return redirect()->route('web.contact')->with('success', 'Your message has been sent successfully!');
    }
}
