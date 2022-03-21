<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category', 'email', 'company','address','website'];

    public function getCategory() :string
    {
        $category = 'Construction';
        switch ($this->category){
            case 1:
                $category = 'Construction';
                break;
            case 2:
                $category = 'Chemical';
                break;
            case 3:
                $category = 'Petroleum';
                break;
            case 4:
                $category = 'Software';
                break;
            case 5:
                $category = 'Automotive';
                break;
            case 6:
                $category = 'Entertainment';
                break;
            deafult:
                $category = 'Construction';
                break;
        }

        return $category;
    }
}
