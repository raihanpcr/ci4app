<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\IncomingModel;
use App\Models\OutgoingModel;

class Home extends BaseController
{
    protected $productModel;
    protected $incomingModel;
    protected $outgoingModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->incomingModel = new IncomingModel();
        $this->outgoingModel = new OutgoingModel();
    }
    public function index()
    {   
        // Total barang terdaftar
        $totalProducts = $this->productModel->countAllResults();

        // Total stok (penjumlahan kolom 'stock')
        $totalStock = $this->productModel->selectSum('stock')->get()->getRow()->stock ?? 0;

        // Hitung transaksi hari ini
        $today = date('Y-m-d');
        $incomingToday = $this->incomingModel
            ->where('DATE(date)', $today)
            ->countAllResults();

        $outgoingToday = $this->outgoingModel
            ->where('DATE(date)', $today)
            ->countAllResults();

        $todayTransactions = $incomingToday + $outgoingToday;

        $data = [
            'totalProducts'     => $totalProducts,
            'totalStock'        => $totalStock,
            'todayTransactions' => $todayTransactions,
        ];

        return view('home', $data);
    }
}
