<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB; // Add this use statement for the DB facade

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC'); // Corrected 'create_at' to 'created_at'
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (name,email,created_at) VALUES (?, ?, ?)', $data); // Corrected 'create_at' to 'created_at' and 'value' to 'VALUES'
    }
}
