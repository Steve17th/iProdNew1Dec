 /* Set the width of the side navigation to 300px */
 function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("mySidenav").style.height = "100%";
    document.getElementById("mainPage").style.opacity = "0.2";
    document.getElementById("menuNav").style.opacity = "0";
 }

 /* Set the width of the side navigation to 0 */
 function closeNav() {
     document.getElementById("mySidenav").style.height = "0";
     document.getElementById("mySidenav").style.width = "0";
     document.getElementById("mainPage").style.opacity = "1";
     document.getElementById("menuNav").style.opacity = "1";
 }

 // Log out alert
 function verifyLogout(){
     alert("You have logged out...");
 }

 function openDashboard(){
    window.open('profile.php', '_self');
 }