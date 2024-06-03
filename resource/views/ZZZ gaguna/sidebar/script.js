let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
let logoutBtn = document.querySelector("#log_out");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange(); 
});

searchBtn?.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();
});

logoutBtn.addEventListener("click", () => {
    window.location.href = "/login-register/login.html"; // Ganti dengan URL halaman login Anda
});

function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); 
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); 
    }
}

logoutBtn.addEventListener("click", () => {
  console.log("Logout button clicked");
  window.location.href = "/login-register/login.html";
});

function formatDate(date) {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

// Set current date
document.getElementById('current-date').innerText = formatDate(new Date());
