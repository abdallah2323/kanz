$(document).ready(function () {
  $("#comment").emojioneArea({
    pickerPosition: "bottom",
  });
});

const icon = document.querySelectorAll("#icon");
Array.from(icon).forEach((element) => {
  element.addEventListener("click", function (e) {
    // element.classList.toggle("hide");
    let iconEl = e.currentTarget.children[0].children[0];
    iconEl.getAttribute("href") === "#heart"
      ? iconEl.setAttribute("href", "#heart-fill")
      : iconEl.setAttribute("href", "#heart");
  });
});
