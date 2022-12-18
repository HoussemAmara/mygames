/*  ---------------------------------------------------
    Theme Name: Anime
    Description: Anime video tamplate
    Author: Colorib
    Author URI: https://colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

"use strict";

(function ($) {
  /*------------------
        Preloader
    --------------------*/
  $(window).on("load", function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");

    /*------------------
            FIlter
        --------------------*/
    $(".filter__controls li").on("click", function () {
      $(".filter__controls li").removeClass("active");
      $(this).addClass("active");
    });
    if ($(".filter__gallery").length > 0) {
      var containerEl = document.querySelector(".filter__gallery");
      var mixer = mixitup(containerEl);
    }
  });

  /*------------------
        Background Set
    --------------------*/
  $(".set-bg").each(function () {
    var bg = $(this).data("setbg");
    $(this).css("background-image", "url(" + bg + ")");
  });

  // Search model
  $(".search-switch").on("click", function () {
    $(".search-model").fadeIn(400);
  });

  $(".search-close-switch").on("click", function () {
    $(".search-model").fadeOut(400, function () {
      $("#search-input").val("");
    });
  });

  /*------------------
		Navigation
	--------------------*/
  $(".mobile-menu").slicknav({
    prependTo: "#mobile-menu-wrap",
    allowParentLinks: true,
  });

  /*------------------
		Hero Slider
	--------------------*/
  var hero_s = $(".hero__slider");
  hero_s.owlCarousel({
    loop: true,
    margin: 0,
    items: 1,
    dots: true,
    nav: true,
    navText: [
      "<span class='arrow_carrot-left'></span>",
      "<span class='arrow_carrot-right'></span>",
    ],
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    mouseDrag: false,
  });

  /*------------------
        Video Player
    --------------------*/
  const player = new Plyr("#player", {
    controls: [
      "play-large",
      "play",
      "progress",
      "current-time",
      "mute",
      "captions",
      "settings",
      "fullscreen",
    ],
    seekTime: 25,
  });

  /*------------------
        Niceselect
    --------------------*/
  $("select").niceSelect();

  /*------------------
        Scroll To Top
    --------------------*/
  $("#scrollToTopButton").click(function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });
})(jQuery);
/////////////////////////////////////////////////////////////////////////////////////////////////////black jack
let i = 0;
let dealerSum = 0;
let yourSum = 0;
let dealerAceCount = 0;
let yourAceCount = 0;
let hidden;
let deck;
let card1;
let canHit = true;
let canStay = true;
window.onload = function () {
  buildDeck();
  shuffleDeck();
  startGame();
};
function buildDeck() {
  let values = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "J",
    "Q",
    "K",
  ];
  let type = ["C", "D", "H", "S"];
  deck = [];
  for (let k = 0; k < 5; k++) {
    for (let i = 0; i < type.length; i++) {
      for (let j = 0; j < values.length; j++) {
        deck.push(values[j] + "-" + type[i]);
      }
    }
  }
}
function shuffleDeck() {
  for (let i = 0; i < deck.length; i++) {
    let j = Math.floor(Math.random() * deck.length);
    let temp = deck[i];
    deck[i] = deck[j];
    deck[j] = temp;
  }
}
function startGame() {
  hidden = deck.pop();
  dealerSum += getValue(hidden);

  dealerAceCount += checkAce(hidden);

  let cardImg = document.createElement("img");
  card1 = deck.pop();
  cardImg.src = "./cards/" + card1 + ".png";
  dealerSum += getValue(card1);
  dealerAceCount += checkAce(card1);
  document.getElementById("dealer-cards").append(cardImg);
  for (let i = 0; i < 2; i++) {
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);

    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);
  }
  document.getElementById("hit").addEventListener("click", hit);
  document.getElementById("stay").addEventListener("click", stay);
  document.getElementById("your-sum").innerText = yourSum;
}
function hit() {
  if (!canHit) {
    return;
  }
  let cardImg = document.createElement("img");
  let card = deck.pop();
  cardImg.src = "./cards/" + card + ".png";
  yourSum += getValue(card);
  yourAceCount += checkAce(card);
  document.getElementById("your-cards").append(cardImg);
  document.getElementById("your-sum").innerText = yourSum;
  yourSum = reduceAce(yourSum, yourAceCount);
  document.getElementById("your-sum").innerText = yourSum;
  if (reduceAce(yourSum, yourAceCount) > 21) {
    canHit = false;
    document.getElementById("results").innerText = "you Lose :(";
    canStay = false;
  }
  document.getElementById("your-sum").innerText = yourSum;
}
function getValue(card) {
  let data = card.split("-");
  let value = data[0];
  if (isNaN(value)) {
    if (value === "A") {
      return 11;
    }
    return 10;
  }
  return parseInt(value);
}
function checkAce(card) {
  if (card[0] == "A") {
    return 1;
  }
  return 0;
}
function reduceAce(playerSum, playerAceCount) {
  while (playerSum > 21 && playerAceCount > 0) {
    playerSum -= 10;
    playerAceCount -= 1;
    document.getElementById("your-sum").innerText = yourSum;
  }
  return playerSum;
}
async function stay() {
  console.log("waaaaaaa");
  if (!canStay) {
    return;
  }
  yourSum = reduceAce(yourSum, yourAceCount);
  dealerSum = reduceAce(dealerSum, dealerAceCount);
  canHit = false;
  let dealerimages = document
    .querySelector("#dealer-cards")
    .querySelectorAll("img");
  for (i = 0; i < dealerimages.length; i++) {
    dealerimages[i].remove();
  }
  let cardImg = document.createElement("img");
  cardImg.src = "./cards/" + hidden + ".png";
  document.getElementById("dealer-cards").append(cardImg);
  let cardImg2 = document.createElement("img");
  cardImg2.src = "./cards/" + card1 + ".png";
  document.getElementById("dealer-cards").append(cardImg2);

  while (dealerSum < 17) {
    await sleep(750);
    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    dealerSum += getValue(card);
    dealerAceCount += checkAce(card);
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    document.getElementById("dealer-cards").append(cardImg);
  }
  let message = "";
  if (yourSum > 21) {
    message = "you Lose :(";
  } else if (dealerSum > 21) {
    message = "you Win :)";
  } else if (yourSum == dealerSum) {
    message = "Tie :)";
  } else if (yourSum > dealerSum) {
    message = "you Won :)";
  } else if (yourSum < dealerSum) {
    message = "you Lose :(";
  }
  document.getElementById("dealer-sum").innerText = dealerSum;
  document.getElementById("your-sum").innerText = yourSum;
  document.getElementById("results").innerText = message;
  canStay = false;
}
function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}
document.getElementById("start").addEventListener("click", startNewGame);
function startNewGame() {
  let yourimages = document
    .querySelector("#your-cards")
    .querySelectorAll("img");
  let dealerimages = document
    .querySelector("#dealer-cards")
    .querySelectorAll("img");
  document.getElementById("results").innerText = "";
  for (i = 0; i < yourimages.length; i++) {
    yourimages[i].remove();
  }
  for (i = 0; i < dealerimages.length; i++) {
    dealerimages[i].remove();
  }
  let cardImg = document.createElement("img");
  cardImg.src = "./cards/BACK.png";
  document.getElementById("dealer-cards").append(cardImg);
  dealerSum = 0;
  document.getElementById("dealer-sum").innerText = "";
  yourSum = 0;
  canHit = true;
  canStay = true;
  dealerAceCount = 0;
  yourAceCount = 0;
  startGame();
}
