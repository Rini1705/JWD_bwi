<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createTourism(){
        return view('admin.pages.create-tourism');
    }
    public function listTourism(){
        $tourism = Tourism::all();
        return view('admin.pages.list-tourism',compact('tourism'));
    }
    public function listTourismAdmin(){
        $tourism = Tourism::all();
        return view('admin.pages.tourism',compact('tourism'));
    }
    public function editTourism($id){
        $tourism = Tourism::findOrFail($id);
        return view('admin.pages.edit-tourism',compact('tourism'));
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function bkt(){
        $transaction = Transaction::all();
        return view('admin.pages.buku-tamu', compact('transaction'));
    }
}
