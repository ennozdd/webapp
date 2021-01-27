<div class="container mt-5">
			<form class="needs-validation" action="signup.php" novalidate>
						
				<label for="validationCustom01">USERNAME</label>
				<input type="text" class="form-control" id="validationCustom01" required>
				<div class="valid-feedback">
					Looks good!
				</div>
								
				<label for="validationCustom02">PASSWORD</label>
				<input type="password" class="form-control" id="validationCustom02"  required>
				<div class="valid-feedback">
					Looks good!
				</div>	

				<label for="validationCustom03">E-MAİL</label>
				<input type="email" class="form-control" id="validationCustom03" required>
				<div class="invalid-feedback">
					Please provide a valid city.
				</div>

				<div class="form-group">
				<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
				<label class="form-check-label" for="invalidCheck">
					Agree to terms and conditions
				</label>
				<div class="invalid-feedback">
					You must agree before submitting.
				</div>
										
				<button class="btn btn-danger ml-5 mt-3" type="submit">Submit form</button>
				
			</form>
		</div>	

  	<script>	  
		(function() {
		'use strict';
		window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			}
			form.classList.add('was-validated');
			}, false);
		});
		}, false);
					})();
 	</script>