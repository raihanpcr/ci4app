<?php 

namespace App\Controllers;

use Config\Database;
use App\Models\ProductModel;
use App\Models\OutgoingModel;

class OutgoingController extends BaseController
{
      protected $outgoingModel;
      protected $productModel;
      protected $db;

      public function __construct()
      {
            $this->outgoingModel = new OutgoingModel();
            $this->productModel = new ProductModel();
            $this->db = Database::connect();
      }
      public function index()
      {     
            $query = $this->outgoingModel->getOutgoingItemsWithProduct();

            $data['outgoings'] = $query->paginate(10);
            $data['pager'] = $this->outgoingModel->pager;

            return view('outgoing/index', $data);
      }

      public function new()
      {
            $data['products'] = $this->productModel->findAll();
            return view('outgoing/create', $data);
      }

      public function create(){

            $validation = \Config\Services::validation();

            $rules = [
                  'product' => 'required',
                  'date' => 'required',
                  'quantity' => 'required'
            ];

            if (!$this->validate($rules)) {
                  return redirect()->back()
                        ->withInput()
                        ->with('errors', $validation->getErrors());
            }

            $quantity = (float) $this->request->getPost('quantity');
            $productId = $this->request->getPost('product');

            $product = $this->db->table('products')
                  ->where('id', $productId)
                  ->get()
                  ->getRow();

            if ($product->stock < $quantity) {
                  return redirect()->back()
                        ->withInput()
                        ->with('error', 'Insufficient stock. Current stock is ' . $product->stock);
            }

            // Insert Data outgoing
            $this->outgoingModel->save([
                  'product_id' => $this->request->getPost('product'),
                  'date' => $this->request->getPost('date'),
                  'quantity' => $this->request->getPost('quantity')
            ]);

            $this->db->transStart();

            // Update stok produk
            $this->db->table('products')
                  ->where('id', $productId)
                  ->set('stock', 'stock - ' . $quantity, false) // false : biar nggak di-escape
                  ->update();

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                  return redirect()->back()->with('error', 'Gagal menambah barang masuk');
            }

            return redirect()->to('/outgoings')->with('success', 'Incoming saved successfully');
      }
}