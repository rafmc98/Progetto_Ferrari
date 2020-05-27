<?php session_start(); 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaIniziale/homePageScript.js"></script>
    <title>Store</title>
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

      <div style="height:120px; width:100%"></div>
    <div id="app">
        <!-- Prodotti -->
        <section class="products">
          <div class="container-prodotti">
            <div v-for="product in products" :key="product.idprodotto" class="product">
              <img :src="product.imgprodotto" class="product-image">
              <div class="product-name"  @click='goToProdotto(product.idprodotto)' >{{ product.nomeprodotto }}</div>
              <div class="product-price"> Price: {{ product.prezzo }}€</div>
              <div class="cart">
                <button class="addCart" @click="updateCart(product, 'add')" >add to cart</button>
              </div>
            </div>
          <div>
        </section>

        <!-- Shopping cart -->
        <section class="shopping-cart">
          <div class="carrello">
            <div class="cart-header"><i class="fas fa-shopping-cart"></i> Cart</div>
            
            <div class="cart-row" v-for="product in cart" :key="product.idprodotto">
                <div class="cart-product">
                  {{ product.nomeprodotto }} ({{ product.quantity }})
                  <button class="delete" @click="deleteProduct(product)">x</button>
                  <button class="cart-button" @click="updateCart(product, 'subtract')" class="cart__button">-</button>
                  <button class="cart-button" @click="updateCart(product, 'add')" class="cart__button">+</button>
                </div>
            </div>
            
            <div class="cart-footer" v-if="showCart">
              <button class="buy-button" @click="buy()">Acquista</button><span style="margin-left:5px;"> {{totalPrice}} €</span>
              <button class="clear-button"v-if="showCart" @click="clear()">clear</button>
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
            mounted() {
              if(localStorage.getItem('acquistati')){
                try {
                  this.acquistati = JSON.parse(localStorage.getItem('acquistati'));
                } catch(e) {
                  localStorage.removeItem('acquistati');
                }
              }
            },
            methods: {
              saveOrder: function() {
                const parsed = JSON.stringify(this.acquistati);
                localStorage.setItem('acquistati',parsed);
              },
              updateCart: function(product, updateType) { 
                // scorre tutti i prodotti      
                for (let i = 0; i < this.products.length; i++) {
                  // se il prodotto è quello selezionato
                  if (this.products[i].idprodotto === product.idprodotto) {
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
                for (let i = 0; i < this.products.length; i++) if(this.products[i].idprodotto == product.idprodotto) this.products[i].quantity = 0;
              },
              clear: function(){
                for (let i = 0; i < this.products.length; i++) this.products[i].quantity = 0;
              },
              buy: function(){ 
                for (let i = 0; i < this.acquistati.length; i++){
                  let costo = this.acquistati[i].quantity * this.acquistati[i].prezzo;
                  axios.post('acquista.php',{
                    nomeprodotto: this.acquistati[i].nomeprodotto,
                    quantity: this.acquistati[i].quantity,
                    prezzo: costo,
                    idprodotto: this.acquistati[i].idprodotto
                  })
                  .then(function (response) {
                  console.log(response);
                  window.location.href = "../paginaConfermaAcquisto/paginaConfermaAcquisto.html";
                  })
                  .catch(function (error) {
                  console.log(error);
                  });
                }
                this.clear();
              },
              goToProdotto: function(param){
                window.location.href = "../paginaProdotto/paginaProdotto.php?idprodotto=" + param;
              }
            },
            created: function(){
              this.getProducts()
              window.addEventListener('beforeunload',this.saveOrder)
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