let emailPattern = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
let NamePattern = /^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u;
let phonePattern = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;


function Check(values)
{
    let name=values.name;
    let phone=values.phone;
    let email=values.email;

    let flag = true;

    if((NamePattern.test(name) === false) || (name.length < 4 || name.length > 30)) {
        window.alert( "Неправильное имя");
        flag = false;
    }
    if(emailPattern.test(email) === false){
        window.alert("Неверная форма E-Mail");
        flag = false;
    }
    if (phonePattern.test(phone) === false) {
        window.alert("Телефон не корректен");
        flag=false;
    }
    return flag;


}