<?php 

namespace App\Controllers;

use Config\Database;
use App\Models\ProductModel;
use App\Models\IncomingModel;

class IncommingController extends BaseController
{
      protected $incommingModel;
      protected $productModel;
      protected $db;

      public function __construct()
      {
            $this->incommingModel = new IncomingModel();
            $this->productModel = new ProductModel();
            $this->db = Database::connect();
      }
      public function index()
      {     
      
            $startDate = $this->request->getGet('start_date');
            $endDate   = $this->request->getGet('end_date');

            $query = $this->incommingModel->getIncomingItemsWithProduct();

            if ($startDate && $endDate) {
            $query = $query->where('incomming_items.date >=', $startDate . ' 00:00:00')
                        ->where('incomming_items.date <=', $endDate . ' 23:59:59');
            }

            $data['incomings'] = $query->paginate(10);
            $data['pager'] = $this->incommingModel->pager;

            $data['start_date']  = $startDate;
            $data['end_date']    = $endDate;

            return view('incoming/index', $data);
      }

      public function new()
      {
            $data['products'] = $this->productModel->findAll();
            return view('incoming/create', $data);
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

            // Insert Data Incoming
            $this->incommingModel->save([
                  'product_id' => $this->request->getPost('product'),
                  'date' => $this->request->getPost('date'),
                  'quantity' => $this->request->getPost('quantity')
            ]);

            $this->db->transStart();

            // Update stok produk
            $this->db->table('products')
                  ->where('id', $productId)
                  ->set('stock', 'stock + ' . $quantity, false) // false = biar nggak di-escape
                  ->update();

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                  return redirect()->back()->with('error', 'Gagal menambah barang masuk');
            }

            return redirect()->to('/incomings')->with('success', 'Incoming saved successfully');
      }
}