<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{

    public function __construct()
    {
    }

    public function index(): View|Factory
    {
        $categories = Category::all();
        $posts =Post::all();

        return view('admin.category.index', compact('categories','posts'));
    }

    public function create(): View|Factory
    {
        return view('admin.category.create');
    }

    public function store(CategoryStoreRequest $request): Redirector|RedirectResponse
    {
        $category = $this->storeCategory($request->all());

        $category->save();

        return redirect()
            ->route('admin.category.show', $category->slug)
            ->with(['success' => 'La catégorie a bien été créé']);
    }

    public function show(string $slug): View|Factory
    {
        $category = Category::where("slug","=", $slug)->first();
        $posts = Post::all();
        return view("admin.category.show", compact('category',"posts"));
    }


    public function edit(string $slug): View|Factory
    {
        $category = Category::where('slug','=',$slug)->first();

        return view("admin.category.edit", compact('category'));
    }

    public function update(CategoryStoreRequest $request, string $slug): Redirector|RedirectResponse
    {
        $category = Category::where('slug', '=', $slug)->first();
        $this->storeCategory($request->all(), $category);

        $category->save();

        return redirect()
            ->route('admin.category.show', $category->slug)
            ->with(['success' => 'La catégorie a bien été modifié']);
    }

    public function destroy(string $slug): RedirectResponse
    {
        $category = Category::where('slug', '=', $slug)->first();
        $category->delete();
        return redirect()
            ->route('admin.category.index')
            ->with(['success' => 'La catégorie a bien été supprimé']);
    }

    private function storeCategory(array $categoryData, Category|null $category = null): Category
    {
        $category ??= new Category();
        $category->name = $categoryData['name'];
        $category->slug = Str::slug($category->name);
        $category->save();

        return $category;
    }
}
