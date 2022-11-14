const $2 = document.querySelector.bind(document);
const $$3 = document.querySelectorAll.bind(document);

const tabs = $$3(".tab-item");
const panes = $$3(".tab-pane");

const tabActive = $2(".tab-item.active");
tabs.forEach((tab, index) => {
  const pane = panes[index];

  tab.onclick = function () {
    $2(".tab-item.active").classList.remove("active");
    $2(".tab-pane.active").classList.remove("active");

    this.classList.add("active");
    pane.classList.add("active");
  };
});


// Sidebar Menu
const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

// loading screen
window.addEventListener("load",()=>{
    const loader = document.querySelector(".loader");

    loader.classList.add("loader-hidden");
    loader.addEventListener("transitioned",()=>{
        document.body.removeChild("loader");
    })
})


// upload 
const form = document.querySelector(".img-upload"),
fileInput = document.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");

const dropbtn = document.querySelector(".dropbtn"),
myDropdown = document.getElementById("myDropdown");
dropbtn.onclick=function(){
    myDropdown.classList.toggle("show");
}


// Close the dropdown if the user clicks outside of it


// open nav
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginRight = "250px";
  }

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
}

// select choice
const panesvehicle = $$3(".tab-vehicle");
var select = document.getElementById('validationCustom04');
    select.onclick = function () {
      var option = select.options[select.selectedIndex];
      const panes = panesvehicle[select.selectedIndex];
        $2(".tab-vehicle.active").classList.remove("active");
        panes.classList.add("active");
    }