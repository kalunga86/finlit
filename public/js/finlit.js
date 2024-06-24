const sidebarToggleBtn = document.querySelector(".sidebar-toggle");
const sidebar = document.querySelector(".sidebar");
const mainContent = document.querySelector(".main-content");

sidebarToggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    mainContent.classList.toggle("shifted");
});

window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
        sidebar.classList.remove("open");
        mainContent.classList.remove("shifted");
    }
});

document.getElementById("notificationBtn").addEventListener("click", () => {
    document.getElementById("notificationMenu").classList.toggle("show");
});

document.getElementById("profileBtn").addEventListener("click", () => {
    document.getElementById("profileMenu").classList.toggle("show");
});

// Close dropdowns if clicking outside
window.addEventListener("click", (e) => {
    const notificationBtn = document.getElementById("notificationBtn");
    const notificationMenu = document.getElementById("notificationMenu");
    const profileBtn = document.getElementById("profileBtn");
    const profileMenu = document.getElementById("profileMenu");

    if (!notificationBtn.contains(e.target) && !notificationMenu.contains(e.target)) {
        notificationMenu.classList.remove("show");
    }

    if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
        profileMenu.classList.remove("show");
    }
});