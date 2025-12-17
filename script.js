let cartCount = 0;
const buttons = document.querySelectorAll("button");
const cartDisplay = document.getElementById("viewCart");

buttons.forEach(btn => {
  if (btn.textContent === "Add to Cart") {
    btn.addEventListener("click", () => {
      cartCount++;
      cartDisplay.textContent = `🛒 View Cart (${cartCount})`;
    });
  }
});
