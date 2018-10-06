<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	
	private function setting(){
	
		$this->load->model('item_model', 'item');
	}
	
	public function add()
	{
		$this->setting();
		
		$order_id = $this->item->addCart($this->input->post('user_id'), $this->input->post('item_id'), $this->input->post('amount'));
	}
	
	public function load_cart()
	{
	    $this->setting();
	    
	    $user_id = $this->input->post('data');
	    $cart_items = $this->item->loadCart($user_id);
	    $output = '';
	    $output .= '<h3>Kosár</h3><br />
				        <div class="table-responsive">
						  <div align="right">
						      <button type="button" id="clear_cart" class="btn btn-default btn-warning">Kosár törlése</button>
						  </div><br />
						  <table class="table table-bordered">
						      <tr>
							     <th width="40%">Név</th>
							     <th width="30%">Mennyiség</th>
							     <th width="30%"></th>
							  </tr>';
	    $count = 0;
	    //var_dump($cart_items);
	    foreach($cart_items as $items)
	    {
	        $count++;
	        $output .= '<tr>
                            <td>'.$items->item_name.'</td>
                            <td>'.$items->amount.'</td>
                            <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items->id.'">Törlés</button></td>
                        </tr>';
	    }
	    $output .= '</table></div>';
	    
	    if($count == 0)
	    {
	        $output = '<h3 align="center">A kosár üres</h3>';
	    }
	    echo $output;
	}
	
	public function remove() 
	{
	    $this->setting();
	    
	    $cart_item_id = $this->input->post('row_id');
	    $this->item->removeCart($cart_item_id); 
	}
	
	public function clear() 
	{
	    $this->setting();
	    
	    $user_id = $this->input->post('user_id');
	    $this->item->clearCart($user_id); 
	}
}