/* function userDetailsToggle() {
    var toggleUserDetails = document.querySelectorAll(".user-details");
    for (let index = 0; index < toggleUserDetails.length; index++) {
        toggleUserDetails[index].classList.toggle("active");
        
    }
    
} */

const profiles = document.querySelectorAll(".profile");
// const items = document.querySelectorAll(".user-details");

profiles.forEach(profile => {
    profile.addEventListener("click", function(){
        console.log(this);
        this.querySelector(".user-details").classList.toggle("active");

        
    });
});


    /* profiles.addEventListener("click", function(){
        items.classList.toggle("active");
        
    });*/
