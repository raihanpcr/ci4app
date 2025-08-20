<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $db;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel= new CategoryModel();
        $this->db = Database::connect();
    }

    public function index()
    {
        $categoryId = $this->request->getGet('category'); // ambil query param category dari URL

        $query = $this->productModel->getProductsWithCategory();

        if ($categoryId) {
            $query = $query->where('products.category_id', $categoryId);
        }

        $data['products'] = $query->paginate(10);
        $data['pager'] = $this->productModel->pager;

        // opsional, kirim semua kategori buat dropdown filter
        $data['categories'] = $this->db->table('categories')->get()->getResult();

        $data['categoryId'] = $categoryId;
        // dd($data['categories']);

        return view('products/index', $data);
    }


    public function show($id)
    {
        $data['product'] = $this->productModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();

        // cek isi array product
        var_dump($data['product']);
        exit;
        return view('products/edit', $data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('products/create', $data);
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
    public function update($id)
    {
        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'code'        => $this->request->getPost('code'),
            'category_id' => $this->request->getPost('category'),
            'unit'        => $this->request->getPost('unit'),
            'stock'       => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/products')->with('success', 'Product updated successfully');
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
