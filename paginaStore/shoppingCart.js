const app = new Vue({
    el: '#app',
    // https://vuejs.org/v2/guide/instance.html#Data-and-Methods
    data() {
      return {
        products: [
          {
            id: 1,
            name: 'Product 1',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 2,
            name: 'Product 2',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 3,
            name: 'Product 3',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 4,
            name: 'Product 4',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 5,
            name: 'Product 5',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 7,
            name: 'Product 7',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 8,
            name: 'Product 8',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 9,
            name: 'Product 9',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
          {
            id: 10,
            name: 'Product 10',
            description: 'This is an incredibly awesome product',
            quantity: 0,
          },
        ],
        showCart: false,
        acquistati:''
      };
    },
    // https://vuejs.org/v2/guide/computed.html
    computed: {
      cart() {
        //mostra tutti i prodotti che hanno che hanno una quantità maggiore di 0 e che sono stati quindi aggiunti al carrello
        this.acquistati = this.products.filter(product => product.quantity > 0);
        if(this.acquistati.length > 0) this.showCart = true;
        if(this.acquistati.length == 0) this.showCart = false;
        return this.acquistati;
      },
      totalQuantity() {
        // calcola la quantità totale di prodotti nel carrello
        return this.products.reduce((total, product) => total + product.quantity,0);
      }
    },
    // https://vuejs.org/v2/guide/events.html#Methods-in-Inline-Handlers
    methods: {
      updateCart(product, updateType) { 
        // scorre tutti i prodotti      
        for (let i = 0; i < this.products.length; i++) {
          // se il prodotto è quello selezionato
          if (this.products[i].id === product.id) {
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
      deleteProduct(product){     
        for (let i = 0; i < this.products.length; i++) if(this.products[i].id == product.id) this.products[i].quantity = 0;
      },
      clear(){
        for(let i = 0; i < this.products.length; i++) this.products[i].quantity = 0;
      },
      buy(){
        /* implementa acquisto (collegamento DB) */
        return null;
      }
    }
  });