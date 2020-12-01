

const btnNext = document.querySelector(".seta_direita");
const btnReturn = document.querySelector(".seta_esquerda");
const img = document.querySelector("#imgSlider");


let imagem = 0

btnNext.addEventListener('click', function(){
    if (imagem == 0){
        img.src = "./imagem/imgslide1.jpg"
        imagem = 1
    }else if(imagem == 1){
        img.src = "./imagem/imgslide2.jpg"
        imagem = 2
    }else if(imagem == 2){
        img.src = "./imagem/imgslide3.jpg"
        imagem = 3
    }else {
        img.src = "./imagem/imgslide4.png"
        imagem = 0
    };

});


btnReturn.addEventListener("click", function(){

    if (imagem == 3){
        img.src = "./imagem/imgslide4.png"
        imagem = 2
    }else if(imagem == 2){
        img.src = "./imagem/imgslide3.jpg"
        imagem = 1
    }else if(imagem == 1){
        img.src = "./imagem/imgslide2.jpg"
        imagem = 0
    }else {
        img.src = "./imagem/imgslide1.jpg"
        imagem = 3
    };

});

setInterval(function carrosel(){
       if (imagem == 0){
        img.src = "./imagem/imgslide1.jpg"
        imagem = 1
    }else if(imagem == 1){
        img.src = "./imagem/imgslide2.jpg"
        imagem = 2
    }else if(imagem == 2){
        img.src = "./imagem/imgslide3.jpg"
        imagem = 3
    }else {
        img.src = "./imagem/imgslide4.png"
        imagem = 0
    }
},2000);
