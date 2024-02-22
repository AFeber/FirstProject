//  JavaScript to make appear on scroll work -->
 
      window.addEventListener("scroll", reveal);

      function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
          var windowheight = window.innerHeight;
          var revealtop = reveals[i].getBoundingClientRect().top;
          var revealpoint = 150;

          if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add("active");
          } else {
            reveals[i].classList.remove("active");
          }
        }
      }

   
    // <!-- JavaScript for button -->
    
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      // JavaScript for menu button to hide after clicking elsewhere
      window.onclick = function (event) {
        if (!event.target.matches(".dropbtn")) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
              openDropdown.classList.remove("show");
            }
          }
        }
      };
   