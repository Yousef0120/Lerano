//loggedin
    function mustRegistration() {
        alert('You Must Registration First '); window.location.href = '../Mazen/login.php';
        let mylink = document.querySelectorAll('.mylink');
        mylink.forEach(mylink => {
        mylink.href = '#';
    })
    }
