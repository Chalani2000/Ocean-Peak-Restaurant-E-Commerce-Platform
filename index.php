<?php 
require_once "Classes/ItemManager.php";
require_once "cart.php";
$ItemManager = new ItemManager();

$itemarray = $ItemManager->getitemdetails();  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,200;1,600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="style.css">
    <title>Restaurent</title>

    <script>
    
    let cart = [];

function addToCart(itemId, itemName, itemPrice) {
    const existingItem = cart.find(item => item.id === itemId);

    if (!existingItem) {
        const newItem = {
            id: itemId,
            name: itemName,
            price: itemPrice,
            quantity: 1
        };
        cart.push(newItem);
    } else {
        existingItem.quantity += 1;
    }

    updateCartDisplay();
}

    function updateCartDisplay() {
        const cartContent = document.getElementById('cart-content');
        const cartCountElement = document.getElementById('cart-count');
        cartContent.innerHTML = '';

        if (cart.length === 0) {
            cartContent.innerHTML = '<p>Your cart is empty.</p>';
        } else {
            cart.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.innerHTML = `${item.name} - $${item.price}`;
                cartContent.appendChild(cartItem);
            });
            cartCountElement.textContent = cart.length;
        }
    }

    function getSelectedCartItems() {
        return cart;
    }

    function toggleCart() {
        if (cart.length === 0) {
            alert ('Your cart is empty.');
            return false;
        }
        const cartContent = document.getElementById('cart-content');

        // Construct the URL with query parameter for the selected items
        const nextURL = 'cart_details.php' +
            '?cart=' + encodeURIComponent(JSON.stringify(getSelectedCartItems()));

        // Redirect to the next page
        window.location.href = nextURL;
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>
</head>

<body bgcolor="black">

    <!-- <div class="top">
        <div>
         Contact Us +1 966366 20000 / 01 | Oceanrestaurant@.com 
        </div>
    </div> -->
    <header>
    <div style="display: flex; align-items:left; justify-content:left;">
    <img src="images/image70-removebg-preview.png" height="90px" >
        <left><h2 style="font-size: 20px; font-family:Calibri Light (Headings); color: #862c05;"><i>Ocean Peak <br> Restaurant</i></h2></left>
    </div>
        
        <ul class="navbar">
            <li><a href="#home"home>Home</a></li>
            <li><a href="#about"about>About</a></li>
            <li><a href="#menu"menu>Menu</a></li>
            <li><a href="#services"Service>Service</a></li>
            <li><a href="#content"Contact>Contact</a></li>
            <li><a href="login.php"Contact>Login</a></li>
        </ul>
        <!-- <div id="shopping-cart">
            <span class="cart-icon" onclick="toggleCart()">🛒</span>
            <div id="cart-content" class="cart-content">
            </div>
        </div> -->
        <div id="shopping-cart">
            <span class="cart-icon" onclick="toggleCart()">🛒</span>
            <div id="cart-content" class="cart-content"></div>
            <div id="cart-count" class="cart-count">0</div>
        </div>

      </header>

      <div class="middle">
		<div style="background-image:url('./images/image21.jpg');">
		<p>
			<br> <br>
					Healthy Food Services  <br>
			<font size="5px"> We Care About Your chois </font>
		</p> 
		</div>
	</div>
      <!---home start-->
      <section class="home" id="home">
            <div class="home-text">
                <h1>Full Website</h1>
                <h2>Food The <br> Most Precious Things </h2>
                <a href="#" class="btn">Today's Menu</a>
            </div>
                <div class="home-img">
                    <img src="./images/image33.webp" alt="">
                </div>
      </section>
               <!--about start--> 

             <section class="about" id="about">
                  <div class="about-img">
                    <img src="about.png" alt="">
                  </div>
                      <div class="about-text" style="margin-top:50px;">
                        <span>About Us</span><br><br>
                        <font color="#CB5548"> Welcome to <b>Ocean Peak Restaurant..!</b> </font> <br> <br>
                        <h2>Good food and healthy service for you</h2>
         <p>Ocean Peak Restaurant is a culinary destination in America, specializing in the art of flavor
             and shared moments. Chefs create dishes that satisfy the palate and tell stories 
             of quality and craftsmanship. The restaurant offers a destination for unwinding, 
             connecting, and savoring simple pleasures.</p>
             <p>They source the finest local ingredients, 
             ensuring each dish reflects regional flavors. Ocean Peak Restaurant invites you to indulge, 
             connect, and celebrate, whether it's a casual lunch or special celebration.
                        </p>
                        <a href="#" class="btn">Learn More</a>
                      </div>
               </section>

                <!--menu start--> 
                <section class="menu" id="menu">
                    <div class="heading" style="margin-top:50px;">
                        <span>Food Menu</span>
                        <h2>Fresh teste and great price</h2>
                    </div>
                        <div class="menu-container">

                        <?php for ($i = 0; $i < count($itemarray); $i++) {
                                $item = $itemarray[$i]; ?> 
                            <div class="box">
                                <div class="box-img" >
                                <img src="uploads/<?php echo $item["image"]; ?>" alt="<?php echo $item["name"]; ?>">
 
                                </div>
                                <h2><?php echo $item ["name"]  ?></h2>
                                <h3><?php echo $item ["category"]  ?></h3>
                                <span><?php echo "$ ".$item ["price"]  ?>.00</span>
                               
                                <i class='bx bx-cart' onclick="addToCart('<?php echo $item['id']; ?>', '<?php echo $item['name']; ?>', '<?php echo $item['price']; ?>')"></i>
                            </div>

                            <?php } ?>
                        </div>
                </section>

                    <!--services start-->
                    <section class="services" id="services" >
                        <div class="heading" style="margin-top:50px;">
                            <span>Services</span>
                            <h2>We provide best quality food</h2>
                        </div>

                        <div class="service-container">
                            <div class="s-box">
                                <img src="s1.png" alt="">
                                <h3>Order</h3>
                   <p>In a restaurant, the choreography of order unfolds as patrons select dishes with anticipation, 
                    while the kitchen harmoniously transforms preferences into culinary delights.</p>
                            </div>

                            <div class="s-box">
                                <img src="s2.png" alt="">
                                <h3>Shipping</h3>
                     <p>In the intricate dance of restaurant logistics, shipping plays a pivotal role, 
                        ensuring the timely arrival of fresh, high-quality ingredients to the kitchen's doorstep.</p>
                            </div>

                            <div class="s-box">
                                <img src="s3.png" alt="">
                                <h3>Delivered</h3>
                   <p>In the modern dining landscape, restaurant delivery has evolved into a culinary bridge 
                    connecting kitchens with the comfort of patrons' homes.</p>
                            </div>

                        </div>
                    </section>

                    







<center><hr style="height:3px; width:50%;color:red;background-color:red; align:center;"><br></center>
    <h1 style="color:#DB6154 ; font-family:forte; "><center>Customer Review</center></h1><br>
    <center><hr style="height:3px; width:50%;color:red;background-color:red"></center>


    <div class="container">
  <img src="images/image79.avif" alt="Avatar" style="width:90px">
  <p><span>Onara Shany</span></p><br>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span><br><br><br>
  <p style="font-size:18px;">Good product and excellent support service!.</p>
</div>

<div class="container">
  <img src="images/image80.avif" alt="Avatar" style="width:90px">
  <p><span>Jesson peny</span></p><br>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span><br><br><br>
  <p style="font-size:18px;">Amazing customer service, very prompt, friendly and professional! Thank you so much for your hard work!</p>
</div>

<div class="container">
  <img src="images/image81.avif" alt="Avatar" style="width:100px">
  <p><span>Shenu Genny</span></p><br>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span><br><br>
  <p style="font-size:18px;">This guys are extremely helpful, I would highly recommend their business, in a heartbeat would recommend them.
Thank You for all of your help!</p>
</div>

<div class="container">
  <img src="images/image82.avif" alt="Avatar" style="width:90px">
  <p><span>Krithri Anne</span></p><br>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span><br><br><br>
  <p style="font-size:18px;">Great and fast service! Love the simplicity of this company!!</p>
</div>















                    <!--call to action-->

                    <section class="cta">
                        <h2>We make quality food <br>Everyday </h2>
                        <a href="#" class="btn">Let's talk</a>
                    </section>

                     <!--footer start-->

                     <section id="content">
                        <div class="footer">
                            <div class="main">
                                <div class="col">
                                    <h4>Menu Links</h4>
                                    <ul>
                                        <li><a href="#home">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#menu">Menu</a></li>
                                        <li><a href="#services">Service</a></li>
                                        <li><a href="#content">Contact</a></li>
                                    </ul>
                                </div>

                                <div class="col">
                                    <h4>Our Services</h4>
                                    <ul>
                                        <li><a href="https://www.interaction-design.org/literature/topics/web-design/">Web Design</a></li>
                                        <li><a href="https://en.wikipedia.org/wiki/Web_development/">Web Development</a></li>
                                        <li><a href="https://www.discovertoday.co/web?q=introduction+to+marketing&o=1669776&gad_source=1&gclid=CjwKCAiAhJWsBhAaEiwAmrNyqyBDwUUOu7VFVU4oNj6VVJSEZWWtRhPnjTBdlWb3EDsrJqZBy1hsmRoCk8QQAvD_BwE&qo=semQuery&ag=fw&an=google_s&tt=rmd&ad=semA&akid=1000000104dto158114421092kwd-45116790/">Marketing</a></li>
                                        <li><a href="https://theproductmanager.com/topics/what-is-product-management/">Product Management</a></li>
                                        
                                    </ul>
                                </div>

                                <div class="col">
                                    <h4>Information</h4>
                                    <ul>
                                        <li><a href="#about">About Us </a></li>
                                        <li><a href="#Delivery">Delivery Information</a></li>
                                        <li><a href="https://www.aosphere.com/aos/dp?gad_source=1&gclid=CjwKCAiAhJWsBhAaEiwAmrNyq75Gi_KrOVvTPkRvh_HMcnw_FUeygUKIgYstmjRdohDrOUmbgddMThoCCN8QAvD_BwE/">Privacy Policy</a></li>
                                        <li><a href="https://restaurantbluepepper.com/terms-and-conditions/">Terms & Conditions</a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </div>

                                <div class="col">
                                    <h4>Contact Us</h4>
                                     <div class="social">
                                        <a href="https://www.facebook.com/"><i class='bx bxl-facebook' ></i></a>
                                        <a href="https://www.instagram.com/accounts/login/"><i class='bx bxl-instagram'></i></a>
                                        <a href="https://twitter.com/"><i class='bx bxl-twitter'></i></a>
                                        <a href="https://www.youtube.com/"><i class='bx bxl-youtube' ></i></a>
                                     </div>
                                </div>

                            </div>
                        </div>
                     </section>

                     <!--javascript-->
                     <script src="script.js"></script>



</body>
</html>

<div class="icons">
                <a href="https://www.instagram.com/accounts/login/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="https://twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                <a href="https://web.whatsapp.com/"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                <i class="fa fa-question-circle" aria-hidden="true"></i>
            </div>





            
    <div class="nav_down">
		<div>
		 &copy; Ocean Peak Restaurant, site designed & developed by chalani_maduwanthi 
		</div>
	</div>


