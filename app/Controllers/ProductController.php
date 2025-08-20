<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel= new CategoryModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->getProductsWithCategory()->paginate(10);
        $data['pager'] = $this->productModel->pager;

        return view('products/index', $data);
    }

    public function show($id)
    {
        $data['product'] = $this->productModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();
        return view('products/edit');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('products/edit', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {

        $validation = \Config\Services::validation();

        $rules = [
            'category' => 'required',
            'name'     => 'required|min_length[3]',
            'code'     => 'required|is_unique[products.code]',
            'unit'     => 'required',
            'stock'    => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                            ->withInput()
                            ->with('errors', $validation->getErrors());
        }

        $this->productModel->save([
            'category_id' => $this->request->getPost('category'),
            'name' => $this->request->getPost('name'),
            'code' => $this->request->getPost('code'),
            'unit' => $this->request->getPost('unit'),
            'stock' => $this->request->getPost('stock'),
        ]);
        return redirect()->to('/products')->with('success', 'Product created');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();
        return view('products/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/products')->with('success', 'Product deleted');
    }
}
