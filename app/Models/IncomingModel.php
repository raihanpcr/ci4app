<?php 

namespace App\Models;
use CodeIgniter\Model; 

class IncomingModel extends Model {
      protected $table = 'incomming_items';
      protected $primaryKey = 'id';
      protected $allowedFields = ['product_id','date','quantity'];

      //Timestamps added
      protected $useTimestamps = true;
      protected $createdField  = 'created_at';
      protected $updatedField  = 'updated_at';

      public function getIncomingItemsWithProduct() {
            return $this->select('incomming_items.*, products.name as product_name')
                  ->join('products', 'products.id = incomming_items.product_id');
      }
}