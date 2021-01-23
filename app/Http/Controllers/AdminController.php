<?php

namespace App\Http\Controllers;
use DB;
use App\shop_stock;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function UserList(){
        $data['flag'] = 1;
        $data['page_title'] = 'View User';
        $data['users'] = DB::table('users')->orderBy('id','desc')->get(); 
        return view('admin/components/admin_user_list',$data);
    }
    public function UserAdd(){
        $data['flag'] = 2;
        $data['page_title'] = 'Add User';
        return view('admin/webviews/admin_user_add',$data);
    }

    //Shop stock Add
    public function StockList(){
        $data['main_breadcrum'] = 'Stock';
        $data['page_title'] = 'View Stock';
        $data['flag'] = 1; 
        $data['stock'] = DB::table('shop_stocks')->orderBy('id','asc')->get(); 
        return view('admin/webviews/admin_manage_stock',$data);
    }

    public function StockAdd(){
        $data['main_breadcrum'] = 'Stock';
        $data['page_title'] = 'Add Stock';
        $data['flag'] = 2; 
        $data['product'] = DB::table('products')->where('status',0)->get(); 
        return view('admin/webviews/admin_manage_stock',$data);
    }

    public function StockEdit($shop_stock_id){
        $data['main_breadcrum'] = 'Stock';
        $data['page_title'] = 'Edit Stock';
        $data['flag'] = 3; 
        return view('admin/webviews/admin_manage_stock',$data);
    }

    public function StockUpdate($shop_stock_id){
        $data['main_breadcrum'] = 'Stock';
        $data['page_title'] = 'Update Stock';
        $data['flag'] = 4; 
        return view('admin/webviews/admin_manage_stock',$data);
    }

    public function StockDelete($shop_stock_id){
        $data['main_breadcrum'] = 'Stock';
        $data['page_title'] = 'Delete Stock';
        $data['flag'] = 5; 
        return view('admin/webviews/admin_manage_stock',$data);
    }

    public function addproductorder(Request $req)
    {
        // dd($req);
        $product_id = $req->product_name;
        $product_qty = $req->p_qty;
        $product_expiry = $req->exp_date;
        $shop_id = 101;

        // $this->validate($request,[
        //     'p_qty'=>'required|numeric',
        //     'exp_date'=>'required|date'
        //  ]);

        $data1 = new shop_stock;           
            $data1->products_id=$product_id;
            $data1->shop_id= $shop_id;
            $data1->input_quantity=$product_qty; 
            $data1->expiry_date=$product_expiry; 
            $data1->save();
            return back(); 
        
    }

}
