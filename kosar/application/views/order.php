<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	 <div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      		<a href="<?php echo $menu; ?>" class="toggle"><?php echo "Kilépés"; ?></a>
	      </ul>
	      <p class="navbar-text navbar-right hidden-md hidden-sm hidden-xs"><?php echo 'Belépve: ' .$user_name; ?></p>
	    </div>
	</div>
</nav>
<div class="col-lg-6 col-md-6">
  <div class="table-responsive">
   <h3 align="center">Termékek</h3><br />
   <?php
   foreach($items as $row)
   {
    echo '
    	<div class="col-md-4" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc; margin-bottom:16px; height:170px;" align="center">
            <h4>'.$row->item_name.'</h4>
            <input type="text" name="quantity" class="form-control quantity" id="'.$row->id.'" /><br />
            <button type="button" name="add_cart" class="btn btn-default add_cart" data-itemid="'.$row->id.'" data-userid="'.$user.'"  />Kosárba</button>
        </div>
        ';
   }
   ?>
  </div>
</div>
<div class="col-lg-6 col-md-6">
  <div id="cart_details">
 	<h3 align="center"></h3>
  </div>
</div>
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	var user_id = $('.add_cart').data("userid");
	$('#cart_details').load("<?php echo base_url(); ?>index.php/order/load_cart", {data: user_id});
	
	$('.add_cart').click(function(){
		var item_id = $(this).data("itemid");
	  	var amount = $('#' + item_id).val();
	  	var user_id = $(this).data("userid");
	  	if(amount != '' && amount > 0)
	  	{
	   		$.ajax({
		    	url:"<?php echo base_url(); ?>index.php/order/add",
		    	method:"POST",
		    	data:{item_id:item_id, user_id:user_id, amount:amount},
		    	success:function(data)
		    	{
		     		alert("A termék a kosárban!");
		    		$('#cart_details').load("<?php echo base_url(); ?>index.php/order/load_cart", {data: user_id});
		     		$('#' + item_id).val('');
		    	}
	   		});
	  	}
	  	else
	  	{
	   		alert("Kérem adjon meg mennyiséget!");
	  	}
	 });

     $(document).on('click', '.remove_inventory', function(){
      	var row_id = $(this).attr("id");
      	var user_id = $('.add_cart').data("userid");
      	if(confirm("Biztos benne, hogy törli?"))
      	{
       		$.ajax({
            	url:"<?php echo base_url(); ?>index.php/order/remove",
            	method:"POST",
            	data:{row_id:row_id},
            	success:function(data)
            	{
             		alert("A termék sikeresen kikerült a kosárból!");
             		$('#cart_details').load("<?php echo base_url(); ?>index.php/order/load_cart", {data: user_id});
            	}
       		});
      	}
      	else
      	{
       		return false;
      	}
     });

     $(document).on('click', '#clear_cart', function(){
    	var user_id = $('.add_cart').data("userid");
     	if(confirm("Biztos, hogy kiüríti a kosarat?"))
      	{
        	$.ajax({
            	url:"<?php echo base_url(); ?>index.php/order/clear",
            	method:"POST",
            	data:{user_id:user_id},
            	success:function(data)
            	{
             		alert("A kosár ürítve!");
             		$('#cart_details').load("<?php echo base_url(); ?>index.php/order/load_cart", {data: user_id});
            	}
           });
        }
        else
        {
        	return false;
        }
	});
    
});
</script>