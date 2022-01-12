<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
::selection{
  color: #fff;
  background: #007bff;
}
body{
  padding: 10px;
}
.wrapper{
  margin: 100px auto;
  max-width: 1100px;
}
.wrapper nav{
  display: flex;
  justify-content: center;
}
.wrapper .items{
  display: flex;
  max-width: 720px;
  width: 100%;
  justify-content: space-between;
}
.items span{
  padding: 7px 25px;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
  color: #007bff;
  border-radius: 50px;
  border: 2px solid #007bff;
  transition: all 0.3s ease;
}
.items span.active,
.items span:hover{
  color: #fff;
  background: #007bff;
}

.gallery{
  display: flex;
  flex-wrap: wrap;
  margin-top: 30px;
}
.gallery .image{
  width: calc(100% / 4);
  padding: 7px;
}
.gallery .image span{
  display: flex;
  width: 100%;
  overflow: hidden;
}
.gallery .image img{
  width: 100%;
  vertical-align: middle;
  transition: all 0.3s ease;
}
.gallery .image:hover img{
  transform: scale(1.1);
}
.gallery .image.hide{
  display: none;
}
.gallery .image.show{
  animation: animate 0.4s ease;
}
@keyframes animate {
  0%{
    transform: scale(0.5);
  }
  100%{
    transform: scale(1);
  }
}

.preview-box{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0.9);
  background: #fff;
  max-width: 700px;
  width: 100%;
  z-index: 5;
  opacity: 0;
  pointer-events: none;
  border-radius: 3px;
  padding: 0 5px 5px 5px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}
.preview-box.show{
  opacity: 1;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
  transition: all 0.3s ease;
}
.preview-box .details{
  padding: 13px 15px 13px 10px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.details .title{
  display: flex;
  font-size: 18px;
  font-weight: 400;
}
.details .title p{
  font-weight: 500;
  margin-left: 5px;
}
.details .icon{
  color: #007bff;
  font-style: 22px;
  cursor: pointer;
}
.preview-box .image-box{
  width: 100%;
  display: flex;
}
.image-box img{
  width: 100%;
  border-radius: 0 0 3px 3px;
}
.shadow{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  z-index: 2;
  display: none;
  background: rgba(0,0,0,0.4);
}
.shadow.show{
  display: block;
}

@media (max-width: 1000px) {
  .gallery .image{
    width: calc(100% / 3);
  }
}
@media (max-width: 800px) {
  .gallery .image{
    width: calc(100% / 2);
  }
}
@media (max-width: 700px) {
  .wrapper nav .items{
    max-width: 600px;
  }
  nav .items span{
    padding: 7px 15px;
  }
}
@media (max-width: 600px) {
  .wrapper{
    margin: 30px auto;
  }
  .wrapper nav .items{
    flex-wrap: wrap;
    justify-content: center;
  }
  nav .items span{
    margin: 5px;
  }
  .gallery .image{
    width: 100%;
  }
}
    </style>
</head>
<body>
  <br><br><br>
<center><h3>Kategori</h3></center>
  <div class="wrapper">
    <!-- filter Items -->
    <nav>
      <div class="items">
        <span class="item active" data-name="all">All</span>
        <span class="item" data-name="shoe">Baju Muslim Pria</span>
        <span class="item" data-name="watch">Baju Muslim Wanita</span>
        <span class="item" data-name="camera">Baju Muslim Anak-Anak</span>
      </div>
    </nav>
    <!-- filter Images -->
    <div class="gallery">
      <div class="image" data-name="shoe"><span><img src="https://s3.bukalapak.com/img/88947808932/s-330-330/2020-07-23T00%3A11%3A25%2B07%3A00.jpeg.webp" alt=""></span></div>
      <div class="image" data-name="watch"><span><img src="{{ asset('assets/header/baju _muslim _wanita _cover.jpg') }}" alt=""></span></div>
      <div class="image" data-name="camera"><span><img src="{{ asset('assets/header/baju_muslim_laki2_cover.jpg') }}" alt=""></span></div>
      <div class="image" data-name="camera"><span><img src="{{ asset('assets/header/anak perempuan.jpg') }}" alt=""></span></div>
    </div>
  </div>
  <!-- fullscreen img preview box -->
  <div class="preview-box">
    <div class="details">
      <span class="title">Image Category: <p></p></span>
      <span class="icon fas fa-times"></span>
    </div>
    <div class="image-box"><img src="" alt=""></div>
  </div>
  <div class="shadow"></div>

  <script>
      //selecting all required elements
const filterItem = document.querySelector(".items");
const filterImg = document.querySelectorAll(".gallery .image");

window.onload = ()=>{ //after window loaded
  filterItem.onclick = (selectedItem)=>{ //if user click on filterItem div
    if(selectedItem.target.classList.contains("item")){ //if user selected item has .item class
      filterItem.querySelector(".active").classList.remove("active"); //remove the active class which is in first item
      selectedItem.target.classList.add("active"); //add that active class on user selected item
      let filterName = selectedItem.target.getAttribute("data-name"); //getting data-name value of user selected item and store in a filtername variable
      filterImg.forEach((image) => {
        let filterImges = image.getAttribute("data-name"); //getting image data-name value
        //if user selected item data-name value is equal to images data-name value
        //or user selected item data-name value is equal to "all"
        if((filterImges == filterName) || (filterName == "all")){
          image.classList.remove("hide"); //first remove the hide class from the image
          image.classList.add("show"); //add show class in image
        }else{
          image.classList.add("hide"); //add hide class in image
          image.classList.remove("show"); //remove show class from the image
        }
      });
    }
  }
  for (let i = 0; i < filterImg.length; i++) {
    filterImg[i].setAttribute("onclick", "preview(this)"); //adding onclick attribute in all available images
  }
}

//fullscreen image preview function
//selecting all required elements
const previewBox = document.querySelector(".preview-box"),
categoryName = previewBox.querySelector(".title p"),
previewImg = previewBox.querySelector("img"),
closeIcon = previewBox.querySelector(".icon"),
shadow = document.querySelector(".shadow");

function preview(element){
  //once user click on any image then remove the scroll bar of the body, so user cant scroll up or down
  document.querySelector("body").style.overflow = "hidden";
  let selectedPrevImg = element.querySelector("img").src; //getting user clicked image source link and stored in a variable
  let selectedImgCategory = element.getAttribute("data-name"); //getting user clicked image data-name value
  previewImg.src = selectedPrevImg; //passing the user clicked image source in preview image source
  categoryName.textContent = selectedImgCategory; //passing user clicked data-name value in category name
  previewBox.classList.add("show"); //show the preview image box
  shadow.classList.add("show"); //show the light grey background
  closeIcon.onclick = ()=>{ //if user click on close icon of preview box
    previewBox.classList.remove("show"); //hide the preview box
    shadow.classList.remove("show"); //hide the light grey background
    document.querySelector("body").style.overflow = "auto"; //show the scroll bar on body
  }
}
  </script>

</body>
</html>