const activarPagina = window.location.pathname;
const navLinks = document.querySelectorAll('.lateral').forEach(link => {
  if(link.href.includes(`${activarPagina}`)){
    link.classList.add('active');
  }
})