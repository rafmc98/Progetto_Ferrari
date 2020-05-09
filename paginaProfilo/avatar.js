var app = new Vue({
    el: '#app',
    data: {
        image: '../Flat avatars icons pack/PNG/256x256/256_1.png',
        variants:[
            { name: 'Avatar 1', iconImage: '../Flat avatars icons pack/PNG/64x64/64_1.png' , image: '../Flat avatars icons pack/PNG/256x256/256_1.png'},
            { name: 'Avatar 2', iconImage: '../Flat avatars icons pack/PNG/64x64/64_2.png' , image: '../Flat avatars icons pack/PNG/256x256/256_2.png'},
            { name: 'Avatar 3', iconImage: '../Flat avatars icons pack/PNG/64x64/64_3.png' , image: '../Flat avatars icons pack/PNG/256x256/256_3.png'},
            { name: 'Avatar 4', iconImage: '../Flat avatars icons pack/PNG/64x64/64_4.png' , image: '../Flat avatars icons pack/PNG/256x256/256_4.png'},
            { name: 'Avatar 5', iconImage: '../Flat avatars icons pack/PNG/64x64/64_5.png' , image: '../Flat avatars icons pack/PNG/256x256/256_5.png'},
            { name: 'Avatar 6', iconImage: '../Flat avatars icons pack/PNG/64x64/64_6.png' , image: '../Flat avatars icons pack/PNG/256x256/256_6.png'},
            { name: 'Avatar 7', iconImage: '../Flat avatars icons pack/PNG/64x64/64_7.png' , image: '../Flat avatars icons pack/PNG/256x256/256_7.png'},
            { name: 'Avatar 8', iconImage: '../Flat avatars icons pack/PNG/64x64/64_8.png' , image: '../Flat avatars icons pack/PNG/256x256/256_8.png'},
            { name: 'Avatar 9', iconImage: '../Flat avatars icons pack/PNG/64x64/64_9.png' , image: '../Flat avatars icons pack/PNG/256x256/256_9.png'},
            { name: 'Avatar 10', iconImage: '../Flat avatars icons pack/PNG/64x64/64_10.png' , image: '../Flat avatars icons pack/PNG/256x256/256_10.png'},
            { name: 'Avatar 11', iconImage: '../Flat avatars icons pack/PNG/64x64/64_11.png' , image: '../Flat avatars icons pack/PNG/256x256/256_11.png'},
            { name: 'Avatar 12', iconImage: '../Flat avatars icons pack/PNG/64x64/64_12.png' , image: '../Flat avatars icons pack/PNG/256x256/256_12.png'},
            { name: 'Avatar 13', iconImage: '../Flat avatars icons pack/PNG/64x64/64_13.png' , image: '../Flat avatars icons pack/PNG/256x256/256_13.png'},
            { name: 'Avatar 14', iconImage: '../Flat avatars icons pack/PNG/64x64/64_14.png' , image: '../Flat avatars icons pack/PNG/256x256/256_14.png'},
            { name: 'Avatar 15', iconImage: '../Flat avatars icons pack/PNG/64x64/64_15.png' , image: '../Flat avatars icons pack/PNG/256x256/256_15.png'},
            { name: 'Avatar 16', iconImage: '../Flat avatars icons pack/PNG/64x64/64_16.png' , image: '../Flat avatars icons pack/PNG/256x256/256_16.png'}
        ],
    },
    methods: {
        updateImage: function(im){
            this.image = im;
        }
    }
});