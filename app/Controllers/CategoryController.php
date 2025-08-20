<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
      protected $categoryModel;

      public function __construct()
      {
            $this->categoryModel = new CategoryModel();
      }

      public function index()
      {
            // Show all categories
            $data['categories'] = $this->categoryModel->paginate(10);
            $data['pager'] = $this->categoryModel->pager;
            return view('categories/index', $data);
      }

      public function create()
      {
            return view('categories/create');
      }

      public function store()
      {
            $this->categoryModel->save([
                  'name' => $this->request->getPost('name')
            ]);
            return redirect()->to('/categories')->with('success','Category added');
      }

      public function edit($id)
      {
            $data['category'] = $this->categoryModel->find($id);
            return view('categories/edit', $data);
      }

      public function update($id)
      {
            $this->categoryModel->update($id, [
                  'name' => $this->request->getPost('name')
            ]);
            return redirect()->to('/categories')->with('success','Category updated');
      }

      public function delete($id)
      {
            $this->categoryModel->delete($id);
            return redirect()->to('/categories')->with('success','Category deleted');
      }
}
