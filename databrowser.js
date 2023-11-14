let currentIndex =0;
let typedoc;
let index = 0;
let currentmake = document.getElementById("currentMake");
let currentmodel = document.getElementById("currentModel");
let currentyear = document.getElementById("currentYear");
let currentcolor=document.getElementById("currentColor");
let currentBody = document.getElementById("currentBodyStyle");
let currentTransmission = document.getElementById("currentTransmission");
let currentType=document.getElementById("currentType");
let currentimg=document.getElementById("photo");
let path = 'mycollection.json';
let max;
let xhr = new XMLHttpRequest();


/*
function loadchars(){
    httpRequest.onreadystatechange= getData;
    httpRequest.open("GET","mycollection.json");
    httpRequest.send();
}
*/
function getAllData(){
    if(!xhr){
        alert('Cannot create an XMLHTTP instance');
        return false;
    }
    xhr.open('POST', 'd.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
    xhr.onreadystatechange =getData;
}

function getData(){
    try{
        if(httpRequest.readyState === XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                alert(JSON.parse(xhr.responseText));
                //alert(httpRequest.responseText);
                //let str = httpRequest.responseText;
                //carArray =JSON.parse(str);
                //displayObjs(carArray[0]);
            }
            else{
                alert("There was a problem.")
            }
        }
    }catch(e){
        alert("caught exception: "+ e.desctiption);
    }
}
getAllData();

function displayObjs(obj){
    document.getElementById("make").value = obj.make;

}

function fetchJSONFile(path){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function(){
        if(httpRequest.readyState ===XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                data = JSON.parse(httpRequest.responseText);
                max= data.length;
                let temp = data[index];
                currentmake.innerHTML=temp.make + " " + temp.model;
                currentyear.innerHTML = temp.year;
                currentcolor.innerHTML = temp.color;
                currentBody.innerHTML = temp.bodystyle;
                currentTransmission.innerHTML = temp.transmission;
                currentType.innerHTML = temp.type;
                photo.src=temp.img;
                let str="";
                /*
                for(let i=0; i<temp.carArray.length; i++){
                    str+=temp.carArray[i];
                    if(i != temp.carArray.length-1){
                        str+= '\n';
                    }
                }
                */
                //currentIndex.value=str;
                
            }
        }
    };
    httpRequest.open('GET',path,true);
    httpRequest.send();
}

function top1(){
    index = 0;
    fetchJSONFile(path);
}
function next(){
    index++;
    fetchJSONFile(path);
}
function previous(){
    index--;
    fetchJSONFile(path);
}
function bottom(){
    index = max - 1;
    fetchJSONFile(path);
}


class Car{
    constructor(make,model,year){
        this.make=make;
        this.model=model;
        this.year=year;

    }
}
let car1= new Car("Toyota","Camry",2017);
let car2= new Car("Ford","Fusion",2020);
let car3= new Car("Honda","Pilot",2021);
let car4= new Car("Nissan","Rouge",2015);
let car5= new Car("Toyota","Corolla",2014);

const cars = new Array(car1,car2,car3,car4,car5);