
//sidebar
function showSideBar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.width = '250px';
    }
    function closeSideBar() {
    const closeSideBar = document.querySelector('.sidebar');
    closeSideBar.style.width = '0px';
    }

//header and nav
class specialHeader extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        <special-header>
            <p>Continue learning from anywhere <span>Mobile - Tablet - Computer</p>
        </special-header>
        <nav class="navbar">
            <div class="home-logo"><a href="../user/Home.html"><img src="../Yousef/Icons/learn.png">Learn<span>o</span></a></div>
            <ul>
            <li class="category" onclick=mustRegistration()><a class="mylink" href="../Yousef/categories.html">Categories</a></li>
            <li class="about"><a href="../user/about.html">About us</a></li>
            <li class="contact-us"><a href="../user/contact.html">Contact</a></li>
            <li class="details"><a href="../user/details.html">Details</a></li>
            <li class="my-profile"><a href="../Nour/myProfile.php" style="display: flex;">My profile</a></li>
            <li class="log-out" ><a href="../Yousef/index.html">Log out</a></li>
            <li class="menu" onclick=showSideBar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50"
                    viewBox="0 -960 960 960" width="50">
                    <path fill="#031f42" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg></a></li>
            </ul>
        </nav>
        <nav class="sidebar">
            <ul>
            <li class="close" onclick=closeSideBar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50"
                    viewBox="0 -960 960 960" width="50">
                    <path fill="#031f42"
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg></a></li>
            <li class="categories"  onclick=mustRegistration()><a href="#">Categories</a></li>
            <li class="about"><a href="../user/about.html">About us</a></li>
            <li class="contact-us"><a href="../user/ContactUsFinal.html">Contact</a></li>
            <li class="details"><a href="../user/details.html">Details</a></li>
            <li class="my-profile"><a href="../Nour/myProfile.php">My profile</a></li>
            <li class="log-out-side"><a href="../Yousef/index.html">Log out</a></li>
            </ul>
        </nav>

        <style>
            .log-out a {
                color: #108ab1;
                background-color: #e7f3f7;
                display: block;
                text-align: center;
                line-height: 50px;
                width: 150px;
                height: 50px;
                border-radius: 5px;
                transition: 0.5s all;
            }   
        </style> `
    }
}
customElements.define('special-head' , specialHeader)

//footer
class specialFooter extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        <footer>
            <div class="footer-learno">
            <h2>Learno</h2>
            <p class="p">Learno is a free educational<br> platform for everyone <br> who wants to learn</p>
            </div>
            <div class="footer-permalinks">
            <h2>Permalinks</h2>
            <p><a href="../user/Home.html">Home</a></p>
            <p><a class="mylink" href="../Yousef/categories.html" onclick=mustRegistration()>Categories</a></p>
            <p><a href="../user/about.html">About us</a></p>
            <p><a href="../user/contact.html">Contact</a></p>
            </div>
            <div class="footer-primacy">
            <h2>Primacy</h2>
            <p class="p">Privacy Policy</p>
            <p class="p">Terms and Conditions</p>
            <p class="p">Refunds Policy</p>
            </div>
            <div class="footer-contact-us">
            <h2>Contact us</h2>
            <p class="p">+01 234 567 8910</p>
            <p class="p">Learno@gmail.com</p>
            <div class="Social-media">
                <a href=""><img src="../Yousef/Icons/facebook-app-symbol.png" alt=""></a> <a href=""><img src="../Yousef/Icons/instagram.png"
                    alt=""></a>
                <a href=""><img src="../Yousef/Icons/twitter.png" alt=""></a> <a href=""><img src="../Yousef/Icons/linkedin.png" alt=""></a>
            </div>
            </div>
        </footer>
        <copyright>
            <p>Copyright &copy; Learno 2024</p>
        </copyright>`
    }
}
customElements.define('special-footer' , specialFooter)

//Parallax
document.addEventListener("mousemove", parallax);
function parallax(e) {
    document.querySelectorAll("#object").forEach(move => {
        
        var moving_value = move.getAttribute("data-value");
        var x = (e.clientX * moving_value)/100;
        var y = (e.clientY * moving_value)/100;

        move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)"})
}