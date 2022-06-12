<?php
namespace App\Models;
use App\Models\Model;

class AnnoncesModel extends Model
{
    public function __construct()
    {
        $this->table = 'annonces';
    }
}