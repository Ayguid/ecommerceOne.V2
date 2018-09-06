


var forms= document.forms;

for (var i = 0; i < forms.length; i++) {
  forms[i].addEventListener('click', addProduct, false);
}




function addProduct(e) {
  e.preventDefault();
  var data = new FormData(e.target.form);
  //start cart counter
  var cartCounter=0;

  //start ajax request
  $.ajax({
    url: '/cart',
    type: "POST",
    timeout: 5000,
    data: data,
    contentType: false,
    cache: false,
    processData: false,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //succes proceed to...
    success:function(data){
      // swal('Product Added');
      //como pasa data de ser un request a un response?????!!!
      response= Object.values(data);
      response.forEach(function(element) {
        cartCounter += element.qty;});
        document.getElementById("cartCount").innerHTML = cartCounter;
      },
      //error execute
      error:function(){
        alert("error!!!!");
      }});
      e.stopPropagation();
    }
