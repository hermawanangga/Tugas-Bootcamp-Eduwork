// Mengambil semua tombol filter
const filterButtons = document.querySelectorAll(".portfolio-filter button");

// Mengambil semua card portfolio
const portfolioCards = document.querySelectorAll(".portfolio-card");

// Event ketika tombol filter diklik
filterButtons.forEach((button) => {
  button.addEventListener("click", () => {

    // Menghapus class active dari semua tombol
    filterButtons.forEach((btn) => btn.classList.remove("active"));

    // Menambahkan class active ke tombol yang diklik
    button.classList.add("active");

    // Mengambil kategori dari tombol
    const filter = button.dataset.filter;

    // Melakukan filter card
    portfolioCards.forEach((card) => {

      const category = card.dataset.category;

      if (filter === "all" || filter === category) {
        card.style.display = "";
      } else {
        card.style.display = "none";
      }

    });

  });
});