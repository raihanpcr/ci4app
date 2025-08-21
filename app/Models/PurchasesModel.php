<?php 

namespace App\Models;
use CodeIgniter\Model;

class PurchasesModel extends Model { 
      
      //name of table
      protected $table = 'purchases';
      protected $primaryKey = 'id';
      protected $allowedFields = ['vendor_name','alamat', 'buyer_name', 'item', 'date'];

      //Timestamps added
      protected $useTimestamps = true;
      protected $createdField  = 'created_at';
      protected $updatedField  = 'updated_at';

}