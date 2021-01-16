<?php
function redirectionToMain(){
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']=true) {
            header('Location:'. URL.Main);
        }
    }
}