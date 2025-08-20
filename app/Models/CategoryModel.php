<?php 

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model { 
      
      //name of table
      protected $table = 'categories';
      protected $primaryKey = 'id';
      protected $allowedFields = ['name'];

      //Timestamps added
      protected $useTimestamps = true;
      protected $createdField  = 'created_at';
      protected $updatedField  = 'updated_at';
}