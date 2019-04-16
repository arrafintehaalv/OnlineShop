	</div><!-- /.container -->


	<!-- Footer -->
	<footer class="text-center" id="footer">
		&copy; Copyright 2016 Shaunta's Boutique
	</footer>

	<script>
		$(window).scroll( function() {
			var vscroll = $(this).scrollTop();
			//console.log(vscroll);
			$('#logotext').css({
				"transform" : "translate(0px, "+vscroll/2+"px)"
			});
			$('#back-flower').css({
				"transform" : "translate("+vscroll/5+"px, -"+vscroll/12+"px)"
			});
			$('#fore-flower').css({
				"transform" : "translate(0px, -"+vscroll/2+"px)"
			});
		});

		function detailsmodal(id) {
			var data = {"id" : id};
			// send data to detailsmodal.php
			jQuery.ajax({
				url		: '/E/includes/detailsmodal.php',
				method	: "post",
				data	: data,
				success	: function(data){
					jQuery('body').append(data);
					jQuery('#details-modal').modal('toggle');
				},
				error	: function(){
					alert("Something went wrong!");
				}
			});
		}

		function update_cart(mode,edit_id,edit_size){
			var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
			jQuery.ajax({
				url : '/E/admin/parsers/update_cart.php',
				method : "post",
				data : data,
				success : function(){location.reload()},
				error : function(){alert('Something Went Wrong')},
			});
		}

		function add_to_cart(){
			jQuery('#modal-errors').html("");
			var size = jQuery('#size').val();
			var quantity = jQuery('#quantity').val();
			var available = jQuery('#available').val();
			var error = '';
			var data = jQuery('#add_product_form').serialize();
			if(size == '' || quantity == '' || quantity == 0){
				error += '<p class="text-center text-danger">You must choose a size and quantity</p>';
				jQuery('#modal-errors').html(error);
				return;
			}
			else if(quantity > available){
				error += '<p class="text-center text-danger">There are only '+available+' available</p>';
				jQuery('#modal-errors').html(error);
				return;
			}else{
				jQuery.ajax({
					url : '/E/admin/parsers/add_cart.php',
					method : 'post',
					data : data,
					success : function(){
						location.reload();
					},
					error : function(){alert('Wrong')}
				});
			}
		}
	</script>
</body>
</html>