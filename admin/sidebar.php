<div class="sidebar">
    <h3 class="heading">Menu</h3>
    <ul>
        <li>
            <a href="./dash.php" class="">
                <i class="fa-solid fa-house"></i>
                Dashboard</a>
        </li>
        <li>
            <a href="./manage-category.php">
                <i class="fa-brands fa-youtube"></i>
                Tour</a>
        </li>
        <li>
            <a href="./manage-booking.php"><i class="fa-solid fa-phone"></i> Booking</a>
        </li>
        <li>
            <a href="./manage-location.php"><i class="fa-solid fa-calendar-check"></i> Location</a>
        </li>
        <li>
            <a href="./manage-contact.php"><i class="fa-solid fa-plane"></i> Contact</a>
        </li>
        <li>
            <a href="./manage-page.php"><i class="fa-solid fa-briefcase"></i> Pages</a>
        </li>
        <li>
            <a href="./manage-news.php"><i class="fa-solid fa-briefcase"></i> News</a>
        </li>
        <li>
            <a href="./manage-user.php">
                <i class="fa-solid fa-user"></i>
                Manage User</a>
        </li>
        <li>
            <a href="../public/index.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Store
            </a>
        </li>
        <li>
            <a href="./logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<script>
var sub = document.querySelectorAll(".sidebar ul > li > a");
console.log(sub);
for (let index = 0; index < sub.length; index++) {
    sub[index].onclick = function() {
        for (let i = 0; i < sub.length; i++) {
            sub[i].classList.remove("active");

        }
        sub[index].classList.add("active");
    }

}
</script>