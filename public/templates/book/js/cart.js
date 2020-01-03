document.addEventListener("DOMContentLoaded",function(){
    let addProduct = document.getElementById('add-product');
    addProduct.onclick = function(){
        let quantity = document.getElementById('quantity').value;
        let id_produc = this.getAttribute('data-id_product');
    }
},false);