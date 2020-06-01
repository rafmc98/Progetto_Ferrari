<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" type="text/javascript"></script>
    <link href="../paginaF1/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../paginaIniziale/homePage.css" rel="stylesheet">
    <link href="paginaStore.css" rel="stylesheet">
    <link rel="shortcut icon" type="img/png" href="../favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../paginaIniziale/homePageScript.js"></script>
    <title>Store</title>
    <?php include '../templates/jquerySessioni.php'; ?>
  </head>

  <body>


  <?php include '../templates/header-sideBar.php'; ?>

    <div class="titolo-pagina">Ferrari Shop</div>

    
    <div id="app">
        <!-- Prodotti -->
        <section class="products">
          <div class="container-prodotti">
            <div v-for="product in products" :key="product.idprodotto" class="card"> 
              <img :src="product.imgprodotto" class="card-img-top"> 
              <div class="card-body"> 
                <div class="card-title"  @click='goToProdotto(product.idprodotto)' ><strong>{{ product.nomeprodotto }}</strong></div> 
                <div class="cart-text"> Price: {{ product.prezzo }}€</div> 
                  <button class="btn btn-primary addCart" @click="updateCart(product, 'add')" >add to cart</button>
              </div> 
            </div>
          <div>
        </section>

        <!-- Shopping cart -->
        <section class="shopping-cart">
          <div class="carrello">
            
            
            <div class="table-responsive">          
              <table class="table table-light table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th></th>
                    <th></th>
                    <th><i class="fas fa-shopping-cart"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product in cart" :key="product.idprodotto" >
                    <td>{{ product.nomeprodotto }}</td>
                    <td>{{ product.quantity }}</td>
                    <td><button class="btn btn-sm btn-light" @click="updateCart(product, 'add')"><i class="fas fa-plus"></i></button></td>
                    <td><button class="btn btn-sm btn-light" @click="updateCart(product, 'subtract')"><i class="fas fa-minus"></i></button></td>
                    <td><button class="btn btn-sm btn-danger" @click="deleteProduct(product)"><i class="fa fa-trash"></i></button></td>
                  </tr>
                </tbody>
                <tfoot v-if="showCart">
                  <tr>
                    <td><button class="btn btn-primary compra" @click="buy()">Acquista</button></td>
                    <td>{{totalPrice}} €</td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-light" v-if="showCart" @click="clear()">clear</button></td>
                  </tr>
                </tfoot>
              </table>
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
                localStorage.removeItem('products');
              },
              buy: function(){ 
                let l = this.acquistati.length - 1;
                for (let i = 0; i < this.acquistati.length; i++){
                  let costo = this.acquistati[i].quantity * this.acquistati[i].prezzo;
                  axios.post('acquista.php',{
                    nomeprodotto: this.acquistati[i].nomeprodotto,
                    quantity: this.acquistati[i].quantity,
                    prezzo: costo,
                    idprodotto: this.acquistati[i].idprodotto
                  })
                  .then(function (response) {
                    if(i == l){
                      if(response.data == "true"){
                        
                        window.location.href = "../paginaConfermaAcquisto/paginaConfermaAcquisto.html"; 
                        }
                      else{
                        // se l'acquisto non è andato a buon fine significa che  l'utente non ha effettuato il login
                        alert("Devi effettuare il login per procedere all'acquisto");
                      }
                    }
                  console.log(response);
                  })
                  .catch(function (error) {
                  console.log(error);
                  });
                }
              },
              goToProdotto: function(param){
                window.location.href = "../paginaProdotto/paginaProdotto.php?idprodotto=" + param;
              }
            },
            created: function(){
              if(localStorage.getItem('products')){
                try {
                  this.products = JSON.parse(localStorage.getItem('products'));
                } catch(e) {
                  localStorage.removeItem('products');
                }
              }
              else this.getProducts();
            },
            computed: {
              cart() {
                //mostra tutti i prodotti che hanno che hanno una quantità maggiore di 0 e che sono stati quindi aggiunti al carrello
                this.acquistati = this.products.filter(product => product.quantity > 0);
                if(this.acquistati.length > 0) this.showCart = true;
                if(this.acquistati.length == 0) this.showCart = false;
                const parsed = JSON.stringify(this.products);
                localStorage.setItem('products',parsed);
                return this.acquistati;
              },
              totalPrice() {
                // calcola il prezzo totale di acquisto
                return this.acquistati.reduce((total, product) => total + product.prezzo * product.quantity,0);
              }
            }
          });
    </script>

    <?php include '../templates/footer.html'; ?>
</body>
</html>