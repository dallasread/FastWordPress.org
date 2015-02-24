<div class="fwp-pricing">

	<div class="menubar">
		<div class="sidebar-toggler visible-xs">
			<i class="ion-navicon"></i>
		</div>

		<div class="page-title">
			Upgrade My Account
		</div>
	</div>

	<div class="content-wrapper">

		<div class="pricing-wizard">
			<h4>Upgrade to Add Your First WP Installation</h4>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="PZ3XJWJ5AP5AW">
				<input type="hidden" name="on0" value="">
				<input type="hidden" name="os0" id="os0" value="AnnualBasic">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="custom" value="<?php echo $_REQUEST["email"]; ?>">
				
				<div class="step-panel active choose-plan">
					<div class="instructions">
						We're thrilled that you're eager to get started with FastWordPress.org! At any time in the future, you can upgrade to a different plan. All plans come with your own <strong>Dedicated IP</strong> and <strong>Free Migration Help</strong>.<br><br>
						<strong>Please choose a plan below</strong> that suits your needs:
					</div>

					<div class="plans">
						<div class="plan selected clearfix" data-plan="Basic">
							<div class="price">
								$7/mo
							</div>
							<div class="info">
								<div class="name">
									Single Site
								</div>
								<div class="details">
									1 Installation, 1 GB storage, 10,000 Monthly Visitors
								</div>
								<div class="select">
									<i class="fa fa-check"></i>
								</div>
							</div>
						</div>
						<div class="plan clearfix" data-plan="Deluxe">
							<div class="price">
								$19/mo
							</div>
							<div class="info">
								<div class="name">
									Deluxe
								</div>
								<div class="details">
									5 Installations, 5 GB storage, 25,000 Monthly Visitors
								</div>
								<div class="select">
									<i class="fa fa-check"></i>
								</div>
							</div>
						</div>
						<div class="plan clearfix" data-plan="Pro">
							<div class="price">
								$39/mo
							</div>
							<div class="info">
								<div class="name">
									Pro
								</div>
								<div class="details">
									15 Installations, 15 GB storage, 50,000 Monthly Visitors
								</div>
								<div class="select">
									<i class="fa fa-check"></i>
								</div>
							</div>
						</div>
					</div>
					
					<br>
				
					<div class="text-center clearfix">
						<div id="frequency_toggle" class="btn-group-vertical pull-right" data-toggle="buttons">
						  	<label class="btn btn-default active">
						    	<input type="radio" name="frequency" value="Annual" checked="checked"> Save 10% with <strong>Annual</strong> Discount
						  	</label>
						  	<!-- <label class="btn btn-default">
						    	<input type="radio" name="frequency" value="Biannual"> Save 20% with <strong>Bi-Annual</strong> Discount
						  	</label> -->
						  	<label class="btn btn-default">
						    	<input type="radio" name="frequency" value="Monthly"> Pay Each Month (No discount)
						  	</label>
						</div>
					</div>
					
					<br>

					<div class="action pull-right">
						<button type="submit" class="btn btn-primary">
							Billing info 
							<i class="fa fa-chevron-right"></i>
						</button>
					</div>
				</div>
				
			</form>

			
			</div>
		</div>
	</div>
	
</div>