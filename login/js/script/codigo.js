// JavaScript Document
var x;
x=$(document);
x.ready(inicio);

function inicio()
{
var x;
x=$("#linea");
x.click(hacerclick);
x.dblclick(hacerdoble);
}

function hacerclick()
{
var x;
x=$("#linea");
x.css("color","#F00");
x.css("background-color","yellow");
x.css("font-size","24px");
}

function hacerdoble()
{
var x;
x=$("#linea");
x.css("color","#FFF");
x.css("background-color","red");
x.css("font-size","10px");


}