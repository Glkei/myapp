function imgPreView(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    var preview = document.getElementById("preview");
    var previewImage = document.getElementById("previewImage");
     
    if(previewImage != null) {
      preview.removeChild(previewImage);
    }
    reader.onload = function(event) {
      var img = document.createElement("img");
      img.setAttribute("src", reader.result);
      img.setAttribute("id", "previewImage");
      preview.appendChild(img);
    };
   
    reader.readAsDataURL(file);
  }

  function imgPreView2(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    var preview = document.getElementById("preview2");
    var previewImage = document.getElementById("previewImage2");
     
    if(previewImage != null) {
      preview.removeChild(previewImage);
    }
    reader.onload = function(event) {
      var img = document.createElement("img");
      img.setAttribute("src", reader.result);
      img.setAttribute("id", "previewImage2");
      preview.appendChild(img);
    };
   
    reader.readAsDataURL(file);
  }