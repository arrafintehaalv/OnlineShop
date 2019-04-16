<?php 
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/E/');
define('CART_COOKIE','SBwi72UCklwiqzz2');
define('CART_COOKIE_EXPIRE',time() + (86400*30));
define('TAXRATE', 0.1); //Sales tax rate. Set to 0 if you aren't charging tax
define('Currency', 'usd');
define('CHECKOUTMODE', 'TEST'); //Change TEST to live when you are ready to go LIVE

if(CHECKOUTMODE == 'TEST'){
	define('STRIPE_PRIVATE', 'sk_test_eA3edjW9VwrMaYTY62YkPYer');
	define('STRIPE_PUBLIC', 'pk_test_8Qfib1HteVic8Zy6ySRt6PNq');
}


/*if(CHECKOUTMODE == 'LIVE'){
	define('STRIPE_PRIVATE', '');
	define('STRIPE_PUBLIC', '');

}*/