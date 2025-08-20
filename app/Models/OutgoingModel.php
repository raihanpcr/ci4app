<?php 

namespace App\Models;
use CodeIgniter\Model; 

class OutgoingModel extends Model {
      protected $table = 'outgoing_items';
      protected $primaryKey = 'id';
      protected $allowedFields = ['product_id','date','quantity'];

      //Timestamps added
      protected $useTimestamps = true;
      protected $createdField  = 'created_at';
      protected $updatedField  = 'updated_at';

      public function getOutgoingItemsWithProduct() {
            return $this->select('outgoing_items.*, products.name as product_name')
                  ->join('products', 'products.id = outgoing_items.product_id');
      }
}