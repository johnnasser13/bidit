<?php
	
	
	?>
<div class="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1 class="title"><span>Compliment</span></h1>
				<div class="breadcrumb">
					<a href="./index.php">Home</a>
					<span class="delimeter">/</span>
					<span class="current">Compliment</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumb -->


<section class="main-contain bg-white">
	<div class="container">
		<div class="login-area">
			<div class="tab-content">
				<div class="content-area">
					<div class="login-inner">
						<div class="login-form">
							<form method="post" action="">
								<div style="background: green">
									<?php
										if (isset($_SESSION["msg"])) { ?>
											<div class="alert alert-success" role="alert">
												<button type="button" class="close" data-dismiss="alert"
												        aria-label="Close"><span
														aria-hidden="true">&times;</span></button>
												<strong><?= $_SESSION["msg"] ?></strong>
											</div>
											<script>
                                                window.setTimeout(function () {
                                                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                                                        $(this).remove();
                                                    });
                                                }, 8000);
											</script>

											<?php
											unset($_SESSION["msg"]);
										}

									?>
								</div>

								<div class="form-details">
									<label>
										Give us your Opinion
									</label>
									<label class="user">
										<textarea rows="12" cols="100" name="compliment" required><?= (isset($_POST['compliment']) && $_POST['compliment'] !=='') ? $_POST['compliment'] :'' ?></textarea>
									</label>
								</div>
								<button type="submit" class="form-btn" name="submit">Send</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<?php
	
