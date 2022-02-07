"use-strict";

  var objetjs = document.getElementById('objetjs').getAttribute('value');
  var objet = JSON.parse(objetjs);
  var difficulty = objet.tabimg.length;
  
function generation(){
  for (var i = 0; i < difficulty; ++i){
        document.getElementById('case' + i).classList.add('flip');
        document.getElementById('case' + i).innerHTML = "<img class='back-face' src='pictures/pic.jpg'></img>";
        img = document.createElement('img');
        img.classList.add('front-face');
        img.id = "img" + i ;
        img.src = objet.tabimg[i];
        document.getElementById('case' + i).appendChild(img);
  }
}
function cachercartes(){
  setTimeout(function(){
    let cases = Array.from(document.getElementsByClassName('case'));
    cases.forEach(carte => {
      if(!objet.cartesmatched.includes(carte.id)){
      carte.classList.remove('flip');
      }
    });
  },1);
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
        document.getElementById('status').innerHTML = "<strong>Vous avez gagné :) ! </strong> ";
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
  let jeux = new memory_game(objet.temps_restant, cartes);
  document.getElementById('temps').innerHTML = "Il vous reste <strong>" + objet.temps_restant + "</strong> seconde" + ((this.temps_restant > 1) ? "s" : "");
  setTimeout(function(){
   jeux.start();
   jeux.nberror = objet.nberror;
   jeux.tabimg = objet.tabimg;
   jeux.cartesmatched = objet.cartesmatched;
  },2000);
  cartes.forEach(carte => {
    carte.addEventListener('click', () => {
      jeux.flip(carte);
      var objet = JSON.stringify(jeux);
      document.getElementById('objet').setAttribute('value', objet);
    });
   });
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}else {
   ready();
}

