
        <nav class="nav">
            <a class="button" href="#"><img src="img/user.png" alt="user"></a>
        <div class="container">
            <nav class="navbar" id="navid">
                <button type="button" onclick="myFnc(this)" class="toggle-collapse" id="toggle-button">
                    <span class="toggle-icon"></span>
                </button>
                
                <ul class="side-nav">
                    <li class="nav-item">
                        <a href="#" class="logo-menu">G2R Stock</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">Stock</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a href="#"# class="nav-link">Emprunt</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Alertes</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Bilan de Stock</a>
                    </li>
                    <hr>

                </ul>
            </nav>
        </div>
    </nav>
        <script>
            function myFnc(e){
                    e.classList.toggle("show");
                    var elem = document.getElementById("navid"),
                    Style = window.getComputedStyle(elem),
                    left =  Style.getPropertyValue("left");
                    if(left == "-222px"){
                        elem.style.left= "0px";

                    }else{
                        elem.style.left = "-222px";
                    }
            }
        </script>
