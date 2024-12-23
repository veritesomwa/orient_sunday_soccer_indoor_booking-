/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/* Menu show */
navToggle.addEventListener("click", () => {
  navMenu.classList.add("show-menu");
});

/* Menu hidden */
navClose.addEventListener("click", () => {
  navMenu.classList.remove("show-menu");
});

/*=============== SEARCH ===============*/
// const search = document.getElementById("search"),
//   searchBtn = document.getElementById("search-btn"),
//   searchClose = document.getElementById("search-close");

// /* Search show */
// searchBtn.addEventListener("click", () => {
//   search.classList.add("show-search");
// });

// /* Search hidden */
// searchClose.addEventListener("click", () => {
//   search.classList.remove("show-search");
// });

/*=============== LOGIN ===============*/
const login = document.getElementById("user-menu"),
  loginBtn = document.getElementById("login-btn"),
  loginClose = document.getElementById("login-close");

$("#btn-signout-link").click((e) => e.preventDefault());
$("#btn-signout").click((e) => {
  let getLink = $("#btn-signout-link").attr("href");
  window.location.href = getLink;
});

/* Login show */
loginBtn.addEventListener("click", () => {
  login.classList.add("show-login");
});

/* Login hidden */
loginClose.addEventListener("click", () => {
  login.classList.remove("show-login");
});

// AI

const API_KEY =
  "sk-16MZM-3MRX4f2RRhlaE-ubmLrNnTxK45qUY2Q0-CbQT3BlbkFJJiCIcxdSa8ItTcFokJCFDnmAWNhNoU_RIKffPZ2KIA";
const API_URL = "https://api.openai.com/v1/chat/completions";

let question = document.getElementById("question");
let btn_ask = document.getElementById("btn-ask");

let results = document.getElementById("results");

const generate = async () => {
  try {
    const response = await fetch(API_URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${API_KEY}`,
      },
      body: JSON.stringify({
        model: "gpt-3.5-turbo",
        messages: [{ role: "user", content: question.value }],
        temperature: 0.9,
        max_tokens: 200,
      }),
    });

    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.error("Error:", error);
    // results.textContent = "An error occurred while generating the response.";
  }
};

btn_ask.addEventListener("click", generate);

question.addEventListener("keyup", (event) => {
  if (event.key === "Enter") {
    generate();
  }
});
