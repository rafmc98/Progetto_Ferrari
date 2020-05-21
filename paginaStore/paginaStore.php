<?php 
  /* Controllo sessione */
  session_start(); 
  /*if(!isset($_SESSION['email']))
      header("Location: ../paginaLogin/login.html");*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="paginaStore.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaIniziale/homePageScript.js"></script>
    <title>Document</title>
    <script>
      $(document).ready(function(){
        $('#iconaProfilo').css({
            "background-image" : "url('<?php echo $_SESSION['user-pic'] ?>')",
            "background-size" : "cover"
        });
      });
    </script>
</head>

<body>
  <div id="mySidebar" class="sidebar" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#">About</a>
    <div class="dropdown">
      <div class="dropbtn">Formula 1</div>
      <div class="dropdown-content">
        <a href="#">Panoramica</a>
        <a href="#">Auto</a>
        <a href="#">Piloti</a>
      </div>
    </div>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>

    <div class="navbar">
      <div class="openbtn" onclick="openNav()">☰ MENU</div>
      <div class="loginbtn">
          <?php if(isset($_SESSION['email']))
              echo "<div id=\"profile\"><div id=\"iconaProfilo\"></div><div id=\"username\"><a href=\"../paginaProfilo/paginaProfilo.php\">".$_SESSION['nome']."</a></div></div>";
          ?>
          <?php if(!isset($_SESSION['email']))
              echo "<a href=\"../paginaLogin/Login.html\">LOGIN</a>";
          ?>
      </div>
    </div>
    
    
    <div class="header">
      <div class="titolo">Passione Ferrari</div>
    </div>


    <div id="app">
        <!-- Prodotti -->
        <section class="products">
          <div v-for="product in products" :key="product.idProdotto" class="product">
            <img :src="product.imgProdotto" class="product-image">
            <h3 class="product__header">{{ product.nomeProdotto }}</h3>
            <p class="product__description">{{ product.prezzo }}</p>
            <div class="cart">
              <button class="addCart" @click="updateCart(product, 'add')" >add to cart</button>
            </div>
          </div>
        </section>

        <!-- Shopping cart -->
        <section class="shopping-cart">
          <h2 class="nav__header">Products</h2>
          <button v-if="showCart" @click="clear()">clear</button>
          <div class="nav__cart">
            <div class="cart-dropdown">
              <ul class="cart-dropdown__list">
                  <li v-for="product in cart" :key="product.idProdotto">
                      {{ product.nomeProdotto }} ({{ product.quantity }})
                      <button @click="updateCart(product, 'subtract')" class="cart__button">-</button>
                      <button @click="updateCart(product, 'add')" class="cart__button">+</button>
                      <button @click="deleteProduct(product)">X</button>
                  </li>
              </ul>
            </div>
            <div  v-if="showCart">
              <button @click="buy()">Acquista</button><div>{{totalPrice}}</div>
            </div>
          </div>
        </section> 
    </div>     
    <script>
      var app = new Vue({
            el: '#app',
            data:{
                products: '',
                showCart: false,
                acquistati:''
            },
            methods: {
              updateCart: function(product, updateType) { 
                // scorre tutti i prodotti      
                for (let i = 0; i < this.products.length; i++) {
                  // se il prodotto è quello selezionato
                  if (this.products[i].idProdotto === product.idProdotto) {
                    // controlla l'operazione da effettura sulla quantità del prodotto
                    if (updateType === 'subtract') {
                      // se l'operazione è una sottrazione diminiusce la quantità del prodotto nel carrello
                      if (this.products[i].quantity !== 0) this.products[i].quantity--;
                    } 
                    else {
                        // altrimenti aumenta la quantità del prodotto nel carrello
                        this.products[i].quantity++;
                    }
                    break;
                  }
                }
              },
              getProducts: function(){
                axios.get('ajaxProdotti.php')
                    .then(function (response) {
                      app.products = response.data;
                    }).catch(function (error) {
                      console.log(error);
                  });
              },
              deleteProduct: function(product){     
                for (let i = 0; i < this.products.length; i++) if(this.products[i].id == product.id) this.products[i].quantity = 0;
              },
              clear: function(){
                for (let i = 0; i < this.products.length; i++) this.products[i].quantity = 0;
              },
              buy: function(){ 
                for (let i = 0; i < this.acquistati.length; i++){
                  axios.post('acquista.php',{
                    nomeProdotto: this.acquistati[i].nomeProdotto,
                    quantity: this.acquistati[i].quantity,
                    idProdotto: this.acquistati[i].idProdotto
                  })
                  .then(function (response) {
                  console.log(response);
                  })
                  .catch(function (error) {
                  console.log(error);
                  });
                }
                
              }
            },
            created: function(){
              this.getProducts()
            },
            computed: {
              cart() {
                //mostra tutti i prodotti che hanno che hanno una quantità maggiore di 0 e che sono stati quindi aggiunti al carrello
                this.acquistati = this.products.filter(product => product.quantity > 0);
                if(this.acquistati.length > 0) this.showCart = true;
                if(this.acquistati.length == 0) this.showCart = false;
                return this.acquistati;
              },
              totalPrice() {
                // calcola il prezzo totale di acquisto
                return this.acquistati.reduce((total, product) => total + product.prezzo * product.quantity,0);
              }
            }
          });
    </script>
</body>
</html>