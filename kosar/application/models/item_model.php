<?php
class Item_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function getItems()
	{
		$sql = "SELECT * FROM item;";
		$query = $this->db->query($sql);
	
		return $query->result();
	}
	
	public function addCart($user_id, $item_id, $amount)
	{
		$sql = "SELECT id FROM cart WHERE user_id = '".$user_id."';";
		$query = $this->db->query($sql);
		$res = $query->result();
		
		if(!$res){
			$sql = "INSERT INTO cart SET user_id = '".$user_id."';";
			$query = $this->db->query($sql);
			$cart_id = $this->db->insert_id();
		} else {
			$cart_id = $res[0]->id;
		}
		
		$sql = "SELECT id FROM cart_item WHERE cart_id = '".$cart_id."' AND item_id = '".$item_id."';";
		$query = $this->db->query($sql);
		$res = $query->result();
		
		if(!$res){
			$sql = "INSERT INTO cart_item SET cart_id ='".$cart_id."', item_id='".$item_id."', amount='".$amount."';";
			$query = $this->db->query($sql);
			$last_id = $this->db->insert_id();
		} else {
			$sql = "UPDATE cart_item SET amount=amount+'".$amount."' WHERE id = '".$res[0]->id."';";
			$query = $this->db->query($sql);
			$last_id = $res[0]->id;
		}
			
		return $last_id;
	}
	
	public function loadCart($userid) 
	{
	    $sql = "SELECT ci.id, i.item_name, ci.amount FROM cart c 
                        LEFT JOIN cart_item ci ON ci.cart_id = c.id 
                        LEFT JOIN item i ON i.id = ci.item_id 
                        WHERE c.user_id = ".$userid." ORDER BY i.item_name";
	    
	    $query = $this->db->query($sql);
	    $res = $query->result();
	    
	    return $res;
	}
	
	public function removeCart($row_id) 
	{
	    $sql = "DELETE FROM cart_item WHERE id = ".$row_id."";
	    $query = $this->db->query($sql);
	}
	
	public function clearCart($user_id)
	{
	    $sql = "SELECT id FROM cart WHERE user_id = ".$user_id."";
	    $query = $this->db->query($sql);
	    $res = $query->result();
	    $cart_id = $res[0]->id;
	    
	    $sql = "DELETE FROM cart_item WHERE cart_id = ".$cart_id."";
	    $query = $this->db->query($sql);
	    
	    $sql = "DELETE FROM cart WHERE user_id = ".$user_id."";
	    $query = $this->db->query($sql);
	}
	
}