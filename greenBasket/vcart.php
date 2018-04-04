<?php
session_start();
$veggi_id = array();
//session_destroy();

//check if add_to_cart has been submitted

if(filter_input(INPUT_POST, 'add_to_cart')){
	if(isset($_SESSION['vegetable_cart'])){

		//create a counter to keep a track of the remaining vegetable in the cart

		$count = count($_SESSION['vegetable_cart']);

		//create a sequential array for matching array keys to vegetable 

		$veggi_id = array_column($_SESSION['vegetable_cart'],'id');

		//pre_r($veggi_id);

		if(!in_array(filter_input(INPUT_GET,'id'),$veggi_id)){
			$_SESSION['vegetable_cart'][$count]= array(
				'id' => filter_input(INPUT_GET,'id'),
				'name' => filter_input(INPUT_POST,'name'),
				'price' => filter_input(INPUT_POST,'price'),
				'quantity' => filter_input(INPUT_POST,'quantity')
			);

		}
		else{//if product already exists
			//match the id of product 
			for($i = 0;$i<count($veggi_id); $i++){
				if($veggi_id[$i]==filter_input(INPUT_GET,'id')){
					//increment the quantity
					$_SESSION['vegetable_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
				}
			}


		}

	}
	else{
		///////if session shopping cart doesn't exist ,create one 

		//accesing all the data in the database
		$_SESSION['vegetable_cart'][0]= array(
			'id' => filter_input(INPUT_GET,'id'),
			'name' => filter_input(INPUT_POST,'name'),
			'price' => filter_input(INPUT_POST,'price'),
			'quantity' => filter_input(INPUT_POST,'quantity')

		);
	}
}


//check if delete button is clicked 
if(filter_input(INPUT_GET,'action')=='delete'){
	//loop through all the vegetables in shopping cart and match it with the id from GET
	if(!empty($_SESSION['vegetable_cart'])):
	foreach ($_SESSION['vegetable_cart'] as $key => $veggi) {
		# code...
				if($veggi['id']==filter_input(INPUT_GET,'id')){
					unset($_SESSION['vegetable_cart'][$key]);
					
				}

	}
	$_SESSION['vegetable_cart'] = array_values($_SESSION['vegetable_cart']);
	endif;

	//reset session array keys so that they match with veggi_id keys
	
}

//pre_r($_SESSION);
function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

?>
<!DOCTYPE html>

<html>
<head>
	<title>GREENCART</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="vcart.css" rel="stylesheet"/>

</head>

<body>
	<div class = "container" >
		<?php
		$connect = mysqli_connect('localhost','root','1234','shopping_cart');
		$query = 'select * from vegetable';

		$result = mysqli_query($connect,$query);

		if($result):
			if(mysqli_num_rows($result)>0):
				?>
				<div class="dropdown">
					<label for="select_1">Select list:</label>
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Vegetables
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">

				  </ul>

				   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Whole-Seller
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">

				  </ul>
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Region
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">

				  </ul>

				  <br> </br>
				</div>
			<?php	while($veggi = mysqli_fetch_assoc($result)):
					//print_r($veggi);
					?>
					<div class = "col-sm-0 col-md-0 "></div>
					<form method ="post" action = "vcart.php?action=add&id=<?php echo $veggi['id'];?>">
						<div class="vegetable">
							<img src="<?php echo $veggi['image'];?>" class="image img-responsive img-circle" />
							<h4 class="textFormat"><?php echo $veggi['name'];?></h4>
							<h4 class="textFormat"><?php echo "Price per kg: Rs.".$veggi['price'];?></h4>
							<input type="text" name ="quantity" class="form-control" value ="1"/>
							<input type="hidden" name = "name" value="<?php echo $veggi['name'];?>"/>
							<input type="hidden" name = "price" value="<?php echo $veggi['price'];?>"/>
							<input type="submit" name = "add_to_cart" class ="butt btn btn-success" style ="margin-top: 5px" value="Add to cart"/>

						</div>

						
					</form>
					<?php
					
				endwhile;		
			endif;
		endif;
		
		?>
		<div style="clear:both"></div>
			<br/>
			<div class = "table-responsive">
				<table class="table">
					<tr> <th colspan="5"><h3>Order Details</h3></th></tr>
					<tr>
						<th width="40%">Product name</th>
						<th width="20%">Quantity</th>
						<th width="10%">Price per Kg</th>
						<th width="15%">Total price</th>
						<th width="10">Action</th>
					</tr>
					<?php
						if(!empty($_SESSION['vegetable_cart'])):
							$total =0;
							foreach ($_SESSION['vegetable_cart'] as $key => $veggi):
						
					?>
					<tr>
						<td><?php echo $veggi['name']; ?></td>
						<td><?php echo $veggi['quantity']; ?></td>
						<td>Rs. <?php echo $veggi['price']; ?></td>
						<td>Rs. <?php echo number_format($veggi['quantity']*$veggi['price'],2); ?></td>
						<td>
							<a href = "vcart.php?action=delete&id=<?php echo $veggi['id']; ?>">
								<div class="btn btn-danger">Remove</div>
							</a>
						</td>
					</tr>
					<?php 
						$total = $total + ($veggi['quantity']*$veggi['price']);
					endforeach;
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right"><?php echo number_format($total,2); ?></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5">
							<?php
								if(isset($_SESSION['vegetable_cart'])):
									if(count($_SESSION['vegetable_cart'])>0):								
							?>
							<a href="destroy.php" class="btn btn-warning">Checkout</a>
						<?php endif; endif;?>
						</td>
					</tr>
				<?php endif; ?>

				</table>
			</div>
	</div>
</body>


</html>


