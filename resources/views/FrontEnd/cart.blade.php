@extends('FrontEnd.1_Layouts.1_MainLayout')
     @section('PageContents')
    	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($cartItems as $cartItem)
								<tr class="table-body-row">
									{{-- <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td> --}}
                                    <td class="product-remove">
                                        <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="far fa-window-close"></i></button>
                                        </form>
                                        
                                    </td>
                                    
									<td class="product-image">
                                    

                                        <img src="{{$cartItem->product->getFirstMediaUrl('photo', 'thumb') }}">
                                    </td>


									<td class="product-name">{{ $cartItem->product->name }}</td>
									<td class="product-price">{{ $cartItem->product->price }}</td>
									<td class="product-quantity"><input type="number" placeholder="0" value="{{ $cartItem->quantity }}"></td>
									<td class="product-total">${{ $cartItem->quantity * $cartItem->product->price }}</td>
								</tr>
                                @endforeach
							</tbody>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Remove</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                
                            </table>
                            
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					{{-- <div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div> --}}

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	@endsection
