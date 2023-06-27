<link rel="stylesheet" href="navbar.css" />
<nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="images/logo.jpg" alt="">SPK Metode DEA
    </div>

    <div class="wrappers">
         <div class="display">
            <div id="time"></div>
         </div>
         <span></span>
         <span></span>
      </div>

    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell' ></i>
      <img src="images/profile.png" alt="" class="profile" />
    </div>
  </nav>

  <script>
         setInterval(()=>{
           const time = document.querySelector(".display #time");
           let date = new Date();
           let hours = date.getHours();
           let minutes = date.getMinutes();
           let seconds = date.getSeconds();
           let day_night = "AM";
           if(hours > 12){
             day_night = "PM";
             hours = hours - 12;
           }
           if(seconds < 10){
             seconds = "0" + seconds;
           }
           if(minutes < 10){
             minutes = "0" + minutes;
           }
           if(hours < 10){
             hours = "0" + hours;
           }
           time.textContent = hours + ":" + minutes + ":" + seconds + " "+ day_night;
         });
      </script>