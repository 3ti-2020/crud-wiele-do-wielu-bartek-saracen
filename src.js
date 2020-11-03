const cr = {
    spn: document.querySelector('.spn'),
    btn: document.querySelector('.btn'),
    wynik: 1000,
    f: function() {
        if(this.btn.innerHTML === "FOLLOW") {
                    this.wynik++;
                    this.spn.innerHTML = this.wynik;
                    this.btn.innerHTML = "UNFOLLOW";
                }
                else {
                    this.wynik--;
                    this.spn.innerHTML = this.wynik;
                    this.btn.innerHTML = "FOLLOW";
                }
    },
    init: function () {
        this.btn.addEventListener('click',this.f.bind(cr));
    }
}
cr.init();