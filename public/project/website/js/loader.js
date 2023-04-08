window.addEventListener("load", () => {
  const loader = document.querySelector(".loaderr");

  loader.classList.add("loaderr-hidden");

  loader.addEventListener("transitionend", () => {
    document.body.removeChild(document.body.firstChild);
  });
});
