<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?=assets('img/bg-img/40.jpg')?>);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="breadcrumb-content">
					<h2>Login</h2>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Login Area Start ##### -->
<div class="mag-login-area py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-6">
				<div class="login-content bg-white p-30 box-shadow">
					<!-- Section Title -->
					<div class="section-heading">
						<h5>Ingresa con</h5>
					</div>
					
					<form id="loginForm" action="<?=current_url()?>" method="post">
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Correo electrónico">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Contraseña">
						</div>
						<button type="submit" class="btn mag-btn mt-30 btn-block">Iniciar sesión</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ##### Login Area End ##### -->


<script>
	$(function () {
		$('#loginForm').on('submit', function (e) {
			e.preventDefault();
			const data = $(this).serializeArray();
			$('.form-text').each((index, element) => {$(element).text('')});

			$.post(BASE_URL + 'home/login_post', data, function (response) {
				if (!response.status) {
					Utils.showFormErrors(response);
					return false;
				}

				window.location = BASE_URL;
			});

			return false;
		});
	});
</script>
