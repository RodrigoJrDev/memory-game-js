const grid = document.querySelector(".grid");
const spanPlayer = document.querySelector(".player");
const timer = document.querySelector(".timer");

const characters = [
  "beth",
  "jerry",
  "jessica",
  "morty",
  "pessoa-passaro",
  "pickle-rick",
  "rick",
  "summer",
  "meeseeks",
  "scroopy",
];

const createElement = (tag, className) => {
  const element = document.createElement(tag);
  element.className = className;
  return element;
};

let firstCard = "";
let secondCard = "";

const checkEndGame = () => {
  const disabledCards = document.querySelectorAll(".disable-card");
  console.log(disabledCards.length);
  if (disabledCards.length == 20) {
    clearInterval(this.loop);
    alert(
      `Parabéns, ${spanPlayer.innerHTML}! Seu tempo foi: ${timer.innerHTML}`
    );
  }
};

const checkCards = () => {
  const firstCharacter = firstCard.getAttribute("data-character");
  const secondCharacter = secondCard.getAttribute("data-character");

  if (firstCharacter === secondCharacter) {
    firstCard.firstChild.classList.add("disable-card");
    secondCard.firstChild.classList.add("disable-card");

    firstCard = "";
    secondCard = "";

    checkEndGame();
  } else {
    setTimeout(() => {
      firstCard.classList.remove("reveal-card");
      secondCard.classList.remove("reveal-card");

      firstCard = "";
      secondCard = "";
    }, 500);
  }
};

const revealCard = ({ target }) => {
  if (target.parentNode.className.includes("reveal-card")) {
    return;
  }

  if (firstCard === "") {
    target.parentNode.classList.add("reveal-card");
    firstCard = target.parentNode;
  } else if (secondCard === "") {
    target.parentNode.classList.add("reveal-card");
    secondCard = target.parentNode;

    checkCards();
  }
};

const createCard = (character) => {
  const card = createElement("div", "card");
  const front = createElement("div", "face front");
  const back = createElement("div", "face back");

  front.style.backgroundImage = `url(../imgs/${character}.png)`;

  card.appendChild(front);
  card.appendChild(back);
  card.setAttribute("data-character", character);

  card.addEventListener("click", revealCard);

  return card;
};

const loadGame = () => {
  const duplicateCharacters = [...characters, ...characters];
  const shuffledArray = duplicateCharacters.sort(() => Math.random() - 0.5);

  shuffledArray.forEach((character) => {
    const card = createCard(character);
    grid.appendChild(card);
  });
};

// function time_convert(num) {
//   var hours = Math.floor(num / 60);
//   var minutes = num % 60;
//   return hours + ":" + minutes;
// }

const startTimer = () => {
  this.loop = setInterval(() => {
    const currentTime = +timer.innerHTML;
    timer.innerHTML = currentTime + 1;
    // if (currentTime > 5) {
    //   timer.innerHTML = time_convert(currentTime);
    // }
  }, 1000);
};

window.onload = () => {
  if (localStorage.getItem("player") === null) {
    window.location = "../../index.html";
  }
  spanPlayer.innerHTML = localStorage.getItem("player");
  startTimer();
  loadGame();
};
