<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'vendor/autoload.php';
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.pdillo.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = 'p';
    $mail->Password = 'OllieBeer01!';

    $mail->setFrom('marketingassistance@wilburcurtis.com', 'Wilbur Curtis');
    $mail->addAddress('marketingassistance@wilburcurtis.com', 'Wilbur Curtis Marketing');
    $mail->addCC('ashley@flyover.co', 'Ashley Slater');
    $mail->addCC('jp@flyover.co', 'JP Dubois');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'NAFEM Contact Form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Company Name: {$_POST['company-name']}
Phone: {$_POST['phone']}
Message: {$_POST['message']}
EOT;
        if (!$mail->send()) {
            if ($isAjax) {
                http_response_code(500);
            }

            $response = [
                "status" => false,
                "message" => 'Sorry, something went wrong. Please try again later.'
            ];
        } else {
            $response = [
                "status" => true,
                "message" => '<p>Message sent! Thanks for contacting us.</p>'
            ];
        }
    } else {
        $response = [
            "status" => false,
            "message" => 'Invalid email address, message ignored.'
        ];
    }

    if ($isAjax) {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($response);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Wilbur Curtis - SEB Professional</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Join Wilber Curtis at NAFEM 2023">
		<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
		<link rel="stylesheet" href="https://use.typekit.net/lmt7pdu.css">
		<link href="style.css?v2" rel="stylesheet" />
	</head>
<body>
	<header class="header">
		<div class="wrapper">
			<a href="#" class="header-logo"><span>Curtis</span></a>
			<h1 class="header-tagline">Perfecting the art of brewing since 1941.</h1>

			<p class="header-right-phone">800-421-6150</p>
		</div>
		<nav class="header-nav" id="header-nav">
			<div class="wrapper">
				<ul>
					<li><a href="#announcment" class="announcment">Announcement</a></li>
					<li><a href="#status">Status Update</a></li>
					<li><a href="#faq">FAQ</a></li>
					<li><a href="#contact">Contact Us</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="hero">
		<header class="hero-header">
			<div class="wrapper">
				<h1 class="hero-heading">
					Wilbur Curtis Integration to SEB Professional
				</h1>
			</div>
		</header>
	</div>
	<main>
	<section class="turnaround" id="announcment">
		<div class="wrapper">
			<h2>Wilbur Curtis Integration to SEB Professional</h2>
			<p>Starting October 1, 2023, SEB Professional will streamline the ordering process for WMF, Schaerer, and Curtis brands. This means you can now place orders for all three brands through a single system using one purchase order.</p>
			<p>In the coming weeks, we will send more details regarding this transition. After October 1, 2023, ordering from us will be much simpler, especially when combining any of our three brands into a single order.</p>
			<p>To ensure a successful transition, please establish an account with SEB Professional North America. From September 30, 2023, onwards, you will be required to place any Wilbur Curtis order with SEB Professional. Therefore, SEB Professional will be required to be listed as a supplier for your organization. If you already have an account with SEB Professional there is no need to create an additional account. Going forward, you will merely purchase all of our brands through that single account.</p>
			<p>This page will serve as a centralized hub for accessing information about the transition. So, please check back regularly. </p>
			<p>Please expect further communications in the following weeks and months to verify your account setup, provide additional information, explain how your account will be affected, and keep you updated on any changes or revisions.</p>
			<p>If you have questions, please reach out to our Customer Service Team at <a href="mailto:csrassistance@wilburcurtis.com" target="_blank">csrassistance@wilburcurtis.com</a></p>
		</div>
	</section>

	<section class="offerings" id="status">
		<div class="wrapper">	
			<h3>Status Update</h3>

			<p><strong>September 16, 2023</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		</div>
	</section>
	<section class="faq" id="faq">
		<div class="wrapper">	

			<h2>FAQ</h2>

			<div class="faq-item">
				<a href="#" class="question"><strong>Do my Curtis credit terms transfer to SEB?</strong></a>
				<div class="answer">
					<p>Yes – the terms of the account are not changing as a result of the project. Any changes to terms would be due to other business requirements.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>What do I need to do to apply to become a SEB account?</strong></a>
				<div class="answer">
					<p>They do not need to apply for a SEB account that is being migrated.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>Is there a specific form or template for me to use to set up the SEB account?</strong></a>
				<div class="answer">
					<p>No need for them to set one up. They need to setup SEB as a Vendor/Supplier. In their own system.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>Does the SEB application have a place for me to include my current Curtis account number?</strong></a>
				<div class="answer">
					<p>There will be no SEB application needed. Their account will be migrated, but they DO need to set up SEB Pro as a vendor in their system so they can order from us.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>What is the end date for orders going directly to Curtis?</strong></a>
				<div class="answer">
					<p>Last date we will accept an order is 9/29/23 and the order must SHIP prior to Dec 31. No exceptions. Any orders that have request dates or large rollout orders that will move into Jan 2024 MUST be ordered on Oct 2 through SEB Pro.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>Is there any impact on our service providers?</strong></a>
				<div class="answer">
					<p>Yes – for those that are common between both Curtis and SEB Pro today, there will be different rate structures based on skill requirements for Curtis repairs. For service providers who are not already an SP for SEB Pro they will need to be setup in the system so we can dispatch to them.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>Is the process any different for customers that have not recently ordered?</strong></a>
				<div class="answer">
					<p>No - they need to do the same things.</p>
				</div>
			</div>

			<div class="faq-item">
				<a href="#" class="question"><strong>How often will we reach out to the customers with updates? </strong></a>
				<div class="answer">
					<p>Frequently as new information is generated. We will continue to update as we get closer to the cut over time.</p>
				</div>
			</div>

		</div>	
	</section>

	<section class="contact" id="contact">
		<div class="wrapper">
			<h3>Contact Us</h3>
			<div id="status-message">
			<?php if (isset($response)) { 
				echo $response['message']; 
			}?>
			</div>
			<form class="form" id="contact-form" method="POST">
				<input type="text" name="name" id="name" placeholder="Your Name"><br>
				<input type="text" name="company-name" id="company-name" placeholder="Your Company's Name"><br>
				<input type="email" name="email" id="email" placeholder="Email"><br>
				<input type="text" name="phone" id="phone" placeholder="Phone Number"><br>

				<textarea name="message" id="message" rows="8" cols="20">How can we help you?</textarea>
				<input type="submit" value="Submit">
			</form>
		</div>
  	</section>

	<section class="subfooter">
		<div class="wrapper">
			<div class="subfooter-left">
				<h3>Follow Us</h3>
				<a href="https://www.instagram.com/wilburcurtisco" class="instagram"><em>Instagram</em></a>
				<a href="https://www.linkedin.com/showcase/wilbur-curtis/" class="linkedin"><em>LinkedIn</em></a>

			</div>
			<div class="subfooter-center">
			<div class="subfooter-center-container">
					<h3>Contact Us</h3>
						<a href="#contact" class="btn">Lets Talk</a><br>
					<a href="tel:8004216150">800-421-6150</a>
				</div>
			</div>
			<div class="subfooter-right">
				<p>
					<a href="https://www.wilburcurtis.com/categories/g4">Products</a><br>
					<a href="https://www.wilburcurtis.com/get-support">Support</a><br>
					<a href="https://www.wilburcurtis.com/contact">Contact</a><br>
					<a href="https://www.wilburcurtis.com/about/curtis">About</a><br>
				</p>
			</div>
		</div>			
	</section>

	<footer class="footer">
		<p>Copyright &copy; 2023 Wilbur Curtis Co. All rights reserved.</p>
		</footer>

	</main>

	<script type="application/javascript">
	const form = document.getElementById("contact-form")

	function email(data) {
		const message = document.getElementById("status-message")

		fetch("", {
			method: "POST",
			body: data,
			headers: {
				'X-Requested-With' : 'XMLHttpRequest'
			}
		})
		.then(response => response.json())
		.then(response => {message.innerHTML = response.message})

		.catch(error => {
			error.json().then(response => {
				message.innerHTML = response.message
			})
		})
	}


	const submitEvent = form.addEventListener("submit", (event) => {
		event.preventDefault();

		const formData = new FormData(form);

		email(formData);

		const hideform = document.getElementById("contact-form").style.display = 'none';
	})

	/*Sticky Header*/

	window.addEventListener('scroll', function() {
		var headerNav = document.querySelector('.header-nav');
		var scrollPosition = window.scrollY;

		if (scrollPosition > 100) {
			headerNav.classList.add('sticky');
		} else {
			headerNav.classList.remove('sticky');
		}
	});


	// Get all the anchor tags that should trigger smooth scrolling
	var anchorTags = document.querySelectorAll('a[href^="#"]');

	// Attach click event listeners to the anchor tags
	anchorTags.forEach(function(anchorTag) {
		anchorTag.addEventListener('click', function(event) {
		event.preventDefault();

		// Get the target section based on the href attribute of the clicked anchor tag
		var target = document.querySelector(this.getAttribute('href'));

		if (target) {
			// Smoothly scroll to the target section
			target.scrollIntoView({
				behavior: 'smooth'
			});

			// Add the 'active' class to the clicked anchor tag
			anchorTags.forEach(function(tag) {
				tag.classList.remove('active');
			});
			this.classList.add('active');
		}
		});
	});

	// Get all elements with the class 'question'
	var questionLinks = document.querySelectorAll('.question');

	// Iterate over each question link
	questionLinks.forEach(function(questionLink) {
		// Add a click event listener to each question link
		questionLink.addEventListener('click', function(event) {
			event.preventDefault(); 
    
			// Get the parent div with the class 'faq-item'
 			var faqItem = this.parentElement;
    
			// Toggle the 'active' class on the parent div
			faqItem.classList.toggle('active');
		});
	}); 
  

	</script>
</body>
</html>
