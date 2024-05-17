let key = '51d228c7f7595fd65c8f4bbbea0ab1ae'
let ciudad = document.getElementById('city');
let boton = document.getElementById('btn');
let resultado = document.getElementById('resultado');
//Funcion que pide los datos del clima
let get_weather = () => {
    let city_name = ciudad.value;
    let url = `https://api.openweathermap.org/data/2.5/weather?q=${city_name}&appid=${key}&units=metric`
    fetch(url).then((resp) => resp.json()).then(data =>{
        console.log("la temperatura es" + (data.main.temp)+'º');
        console.log(data.weather[0].description);
        console.log(data);
        resultado.innerHTML = `<h2>${data.name}</h2>
        <h1>${data.main.temp}</h1>
        <h4>${data.weather[0].description}</h4>`
    });
}
boton.addEventListener('click', get_weather);