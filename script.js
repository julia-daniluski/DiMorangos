let lista = document.querySelectorAll(".item");
let next = document.getElementById("proximo");
let prev = document.getElementById("anterior");

let contar = lista.length;
let ativo = 0;

next.onclick = () => {
    let desativar = document.querySelector('.ativo');
    desativar.classList.remove('ativo');
    ativo = (ativo >= contar - 1) ? 0 : ativo + 1;
    lista[ativo].classList.add('ativo');
}

prev.onclick = () => {
    let desativar = document.querySelector('.ativo');
    desativar.classList.remove('ativo');
    ativo = (ativo <= 0) ? contar - 1 : ativo - 1;
    lista[ativo].classList.add('ativo');
}