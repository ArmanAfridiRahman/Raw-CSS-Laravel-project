const a_parent = document.querySelectorAll(".a_parent");

a_parent.forEach(function (a_parent_item){
    a_parent_item.addEventListener("click", function (){

        a_parent.forEach(function (a_parent_item){
            a_parent_item.classList.remove("active");
        })
        a_parent_item.classList.add("active");
    })
});

const open = () => {

    const toggle = document.querySelector('.toggle-navigation');
    const toggle_content = document.querySelector('.new-settings-menu');

    const navigation = document.querySelector('.navigation');
    const form = document.querySelector('.settings-menu');
    const list = document.querySelector('.settings-menu-form');
    const list_height = document.querySelector('.settings-menu-table');

    toggle.addEventListener('click', ()=>{
        navigation.classList.toggle('navigation-active');
        form.classList.toggle('settings-menu-toggle');
    });
    toggle_content.addEventListener('click', ()=>{
        list.classList.toggle('settings-menu-form-active');
        list_height.classList.toggle('settings-menu-table-size');
    });
}

open();





