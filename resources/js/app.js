import Vue from 'vue';
import commonComponents from './components';

commonComponents.forEach(component => {
    Vue.component(component.name, component);
});

new Vue({
    el: '#app', created: function () {
        this.urlApp = "http://archivos.myb.jk/";
    }
});



const ButtonOpen = document.querySelector('#ButtonOpen'),
    ButtonClose = document.querySelector('#ButtonClose'),
    Nav = document.querySelector('#Nav');

ButtonOpen.addEventListener('click', function () {
    Nav.classList.add('open')
});

ButtonClose.addEventListener('click', function () {
    Nav.classList.remove('open')
});
