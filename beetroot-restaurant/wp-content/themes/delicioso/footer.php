<footer class="cf" id="colophon" role="contentinfo">
	<!-- TO DO: Footer FallBack/Default -->
	<div class="newsletter container">
		<?php dynamic_sidebar( 'footer-newsletterbar' ); ?>		
	</div>
	<div class="contact container">	
		<section class="contact">
			<h2>Contact</h2>
			<div class="widget">
				<h3>Hours</h3>
				<ul>
					<li>DAYS</li>
					<li>HOURS</li>
				</ul>
			</div>

			<div class="widget">
				<h3>Phone</h3>
				<ul>
					<li><a href="tel://1-000-000-0000">+1 (000)000-0000</a></li>
				</ul>
			</div>

			<div>
				<h3>Address</h3>
				<ul>
					<li>
						<address>
							Av. Jesús García 1866,<br/>
							Ladrón de Guevara, Ladron De Guevara, 44600 Guadalajara, Jal., <br/>
							Mexico
						</address>
					</li>
				</ul>
			</div>

			<div>
				<h3>Email</h3>
				<ul>
					<li><a href="mailto:beetrootrestaurant@gmail.com">BeetrootRestaurant@gmail.com</a></li>
				</ul>
			</div>
		</section>
	</div>
	<?php dynamic_sidebar( 'footer-area' ); ?>		
</footer>
</div> <!-- close #wrapper -->
<?php //must call wp_footer right before </body> for JS and plugins to run
wp_footer(); ?>
</body>
</html>