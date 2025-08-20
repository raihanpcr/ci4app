<?php 

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model { 
      
      //name of table
      protected $table = 'products';
      protected $primaryKey = 'id';
      protected $allowedFields = ['category_id','name','code', 'unit', 'stock'];

      //Timestamps added
      protected $useTimestamps = true;
      protected $createdField  = 'created_at';
      protected $updatedField  = 'updated_at';

      public function getProductsWithCategory() {
            return $this->select('products.*, categories.name as category_name')
                  ->join('categories','categories.id = products.category_id');
      }
}