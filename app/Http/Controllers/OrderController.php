<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Suborder;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = $this->getAllOrder();
    	return view('order/index')->with('orders',$orders);
    }







    /*------------------------------------
    		Services
    -------------------------------------*/
    public function getAllOrder()
    {
    	$successCount=0;
    	$pendingCount=0;
        $intransitCount=0;
    	
    	$order = Order::orderBy('created_at','desc')->get();
    	foreach ($order as $o) {
    		if($o->status){
              $successCount++;
            }else{
              $pendingCount++;
            }
            $orders[]=$this->getOrder($o->oid);
    	}
    	  $orders['successCount']=$successCount;
          $orders['pendingCount']=$pendingCount;
          $orders['intransitCount']=$intransitCount;
    	return $orders;

    }
    public function getOrder($oid)
    {
    	$order=Order::where('oid',$oid)->get();
	    	$r['id']=$order[0]->id;
	        $r['order_id']=$order[0]->oid;
	        $r['date']=$order[0]->created_at;
	        $r['time']=$order[0]->created_at;
	        $r['status']=$order[0]->status;
	        $r['user']=array('id'=>$order[0]->uid);
	       $suborder=Suborder::where('oid',$order[0]->id)->get();
	       $r['suborder']=$suborder;
	       return $r;
    }

}
