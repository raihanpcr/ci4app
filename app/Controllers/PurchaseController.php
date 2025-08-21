<?php

namespace App\Controllers;

use Config\Database;
use App\Models\PurchasesModel;
use CodeIgniter\HTTP\ResponseInterface;

class PurchaseController extends BaseController
{
      protected $purchasesModler;
      protected $db;
      
      public function __construct()
      {
            $this->purchasesModler = new PurchasesModel();
            
            $this->db = Database::connect();
      }

      public function index()
      {
            $data['purchases'] = $this->purchasesModler->paginate(10);
            $data['pager'] = $this->purchasesModler->pager;
            return view('purchases/index', $data);
      }


      public function show($id)
      {
            $data['purchase'] = $this->purchasesModler->find($id);

            return view('purchases/edit', $data);
      }

      /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
      public function new()
      {
            return view('purchases/create');
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
                  'name'      => 'required',
                  'address'   => 'required',
                  'buyer'     => 'required',
                  'item'      => 'required',
                  'date'      => 'required'
            ];

            if (!$this->validate($rules)) {
                  return redirect()->back()
                              ->withInput()
                              ->with('errors', $validation->getErrors());
            }

            $this->purchasesModler->save([
                  'vendor_name'     => $this->request->getPost('name'),
                  'alamat'          => $this->request->getPost('address'),
                  'buyer_name'      => $this->request->getPost('buyer'),
                  'item'            => $this->request->getPost('item'),
                  'date'            => $this->request->getPost('date'),
            ]);
            return redirect()->to('/purchases')->with('success', 'Purchase created');
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
            $data['purchase'] = $this->purchasesModler->find($id);
            
            return view('purchases/edit', $data);
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
            $this->purchasesModler->update($id, [
                  'vendor_name'     => $this->request->getPost('name'),
                  'alamat'          => $this->request->getPost('address'),
                  'buyer_name'      => $this->request->getPost('buyer'),
                  'item'            => $this->request->getPost('item'),
                  'date'            => $this->request->getPost('date'),
            ]);

            return redirect()->to('/purchases')->with('success', 'Purchase updated successfully');
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
            $this->purchasesModler->delete($id);
            return redirect()->to('/purchases')->with('success', 'Purchase deleted');
      }
}
