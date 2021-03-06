"use-strict";

var difficulty = document.getElementById('difficulty').getAttribute('value');

function generation(){
  var nbr; 
  var num_img = "";
  var test = true; 
  var list_nbr = "";
  
  for (var i = 0; i < difficulty; ++i){
    while (test){
      nbr = Math.floor(Math.random() * difficulty) + 1; 
      if(list_nbr.indexOf("-" + nbr + "-") !== -1){
        nbr = Math.floor(Math.random() * difficulty) + 1;
      }else {
        num_img = Math.floor((nbr + 1) / 2); 
        document.getElementById('case' + i).innerHTML = "<img class='back-face' src='pictures/pic.jpg'></img>";
        document.getElementById('case' + i).classList.add('flip');
        img = document.createElement('img');
        img.classList.add('front-face');
        img.id = "img" + i ;
        img.src = "pictures/pic" + num_img + ".jpg";
        document.getElementById('case' + i).appendChild(img);
        list_nbr += "-" + nbr + "-";
        test = false;
      }
    }
    test = true;
  }
}

function cachercartes(){
  setTimeout(function(){
    let cases = Array.from(document.getElementsByClassName('case'));
    cases.forEach(carte => {
      carte.classList.remove('flip');
    });
  },3000);
}

class memory_game{
  constructor(temps, cartes){
    this.temps_jeu = temps;
    this.temps_restant = temps;
    this.tabcartes = cartes;
    this.tabimg = [];
    this.chrono = document.getElementById('temps');
    this.score = document.getElementById('score');
  }
  start(){
    this.nbclick = 0;
    this.nberror = 0;
    this.cartesmatched = [];
    this.carteaverfier = "";
    this.caseaverfier = "";
    this.get_partition();
    this.depart = true;
    this.time = this.startchrono();
  }
  get_partition(){
    this.tabcartes.forEach(carte => {
     this.tabimg.push(carte.getElementsByClassName('front-face')[0].src); 
  });
}
  startchrono(){
  return setInterval(() => {
      --this.temps_restant;
      document.getElementById('temps').innerHTML = "Il vous reste <strong>" + this.temps_restant + "</strong> seconde" + ((this.temps_restant > 1) ? "s" : "");
      if(this.temps_restant === 0){
        clearInterval(this.time);
        document.getElementById('status').innerHTML="<strong>Vous avez perdu :( ! </strong>";
        return;
      }
    }, 1000);
  }

  flip(carte){
    if(this.canflip(carte)){
      ++this.nbclick;
      carte.classList.add('flip');
      if(this.nbclick === 2){
        this.is_matched(carte, this.caseaverfier);
      }
      else{
        this.caseaverfier = carte;
        this.carteaverfier = carte.getElementsByClassName('front-face')[0].src;
      }
    }
  }

  canflip(carte){
    return this.depart && !this.cartesmatched.includes(carte.id) && this.caseaverfier !== carte;
  }
  
  is_matched(carte1, carte2){
    if(carte1.getElementsByClassName('front-face')[0].src === this.carteaverfier){
      this.cartesmatched.push(carte1.id);
      this.cartesmatched.push(carte2.id);
      if(this.cartesmatched.length === this.tabcartes.length){
        clearInterval(this.time);
        document.getElementById('temps').innerHTML = "Vous avez mis <strong>" + (180 - this.temps_restant) + "</strong> seconde" + ((this.temps_restant > 1) ? "s." : ".");
        document.getElementById('score').innerHTML = "Votre score est de <strong>" + this.nberror + "</strong> ereur" + ((this.nberror > 1) ? "s." : ".");
        document.getElementById('status').innerHTML = "<strong>Vous avez gagn?? :) ! </strong> ";
        return;
      }
    }else{
      this.depart = false;
      setTimeout(() => {
        carte1.classList.remove('flip');
        carte2.classList.remove('flip');
        this.depart = true;
      }, 1000);
      ++this.nberror;
    }
    this.caseaverfier = "";
    this.carteaverfier = "";
    this.nbclick = 0;
    document.getElementById('score').innerHTML = "Score : " + this.nberror + "</strong> ereur" + ((this.nberror > 1) ? "s." : ".");
  }
}

function ready() {
  generation();
  cachercartes();
  let cartes = Array.from(document.getElementsByClassName('case'));
  let jeux = new memory_game(180, cartes);
  setTimeout(function(){
   jeux.start();
  },3000);
  cartes.forEach(carte => {
    carte.addEventListener('click', () => {
      jeux.flip(carte);
      var objet = JSON.stringify(jeux);
      document.getElementById('objet').setAttribute('value', objet);
    });
   });
}

if(document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}else {
   ready();
}


