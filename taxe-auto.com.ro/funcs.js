function validateform(ftype){if(ftype==1)var tipasigurare=document.getElementById('tipasigurare').value;if(ftype==1)var asigurator=document.getElementById('asigurator').value;var nume=document.getElementById('nume').value;var prenume=document.getElementById('prenume').value;if(ftype==1)var ocupatie=document.getElementById('ocupatie').value;if(ftype==3||ftype==5)var valoare=document.getElementById('valoare').value;if(ftype!=3)var varsta=document.getElementById('varsta').value;var adresa=document.getElementById('adresa').value;if(ftype==1||ftype==3)var localitate=document.getElementById('localitate').value;var telefon=document.getElementById('telefon').value;var email=document.getElementById('email').value;if(ftype==4)
{var datefrom=document.getElementById('datefrom').value;var dateto=document.getElementById('dateto').value;}
var valid=true;var errtextcolor="#FF0000";var oktextcolor="#000000";var errtext="Va rugam sa completati toate casutele marcate cu rosu !";var mid='';mailcheck=echeck(document.getElementById("email").value);if(mailcheck==true){document.getElementById("l8").style.color=oktextcolor;if(ftype==1)document.getElementById("s8").style.color=oktextcolor;}else{mid='email';valid=false;document.getElementById("l8").style.color=errtextcolor;if(ftype==1)document.getElementById("s8").style.color=errtextcolor;}
if(isnumerictel("telefon")==false||telefon.length<8){mid='telefon';valid=false;document.getElementById("l7").style.color=errtextcolor;if(ftype==1)document.getElementById("s7").style.color=errtextcolor;}else{document.getElementById("l7").style.color=oktextcolor;if(ftype==1)document.getElementById("s7").style.color=oktextcolor;}
if(ftype==1||ftype==3){if(localitate.length==0||multichar("localitate")==false){mid='localitate';valid=false;document.getElementById("l6").style.color=errtextcolor;if(ftype==1)document.getElementById("s6").style.color=errtextcolor;}else{document.getElementById("l6").style.color=oktextcolor;if(ftype==1)document.getElementById("s6").style.color=oktextcolor;}}
if(adresa.length==0||multichar("adresa")==false){mid='adresa';valid=false;document.getElementById("l5").style.color=errtextcolor;if(ftype==1)document.getElementById("s5").style.color=errtextcolor;}else{document.getElementById("l5").style.color=oktextcolor;if(ftype==1)document.getElementById("s5").style.color=oktextcolor;}
n2=true;p2=true;if(ftype!=3)
{if(varsta.length==0||!containsnubmer("varsta")||varsta==0){mid='varsta';valid=false;p2=false;document.getElementById("l44").style.color=errtextcolor;}else{document.getElementById("l44").style.color=oktextcolor;}}
if(ftype==1)
{if(ocupatie.length==0||multichar("ocupatie")==false||containsnubmer("ocupatie")){mid='ocupatie';valid=false;n2=false;document.getElementById("l4").style.color=errtextcolor;}else{document.getElementById("l4").style.color=oktextcolor;}}
if(n2==false||p2==false){if(ftype==1)document.getElementById("s4").style.color=errtextcolor;}else{if(ftype==1)document.getElementById("s4").style.color=oktextcolor;}
n1=true;p1=true;if(prenume.length==0||multichar("prenume")==false||containsnubmer("prenume")){mid='prenume';valid=false;p1=false;document.getElementById("l33").style.color=errtextcolor;}else{document.getElementById("l33").style.color=oktextcolor;}
if(nume.length==0||multichar("nume")==false||containsnubmer("nume")){mid='nume';valid=false;n1=false;document.getElementById("l3").style.color=errtextcolor;}else{document.getElementById("l3").style.color=oktextcolor;}
if(n1==false||p1==false){if(ftype==1)document.getElementById("s3").style.color=errtextcolor;}else{if(ftype==1)document.getElementById("s3").style.color=oktextcolor;}
if(ftype==3||ftype==5)
{if(valoare.length==0||!containsnubmer("valoare")||valoare==0){mid='valoare';valid=false;p2=false;document.getElementById("l55").style.color=errtextcolor;}else{document.getElementById("l55").style.color=oktextcolor;}}
if(ftype==4)
{if(datefrom.length==0||datefrom==0){mid='datefrom';valid=false;p2=false;document.getElementById("l66").style.color=errtextcolor;}else{document.getElementById("l66").style.color=oktextcolor;}
if(dateto.length==0||dateto==0){mid='dateto';valid=false;p2=false;document.getElementById("l77").style.color=errtextcolor;}else{document.getElementById("l77").style.color=oktextcolor;}}
if(valid==true){document.getElementById('form').submit();document.getElementById("error").style.borderWidth=0;}else{document.getElementById("error").style.borderColor=errtextcolor;document.getElementById("error").style.borderWidth=1;document.getElementById("error").innerHTML=errtext;document.getElementById(mid).focus();return false;}}
function isnumeric(p1d){elem=document.getElementById(p1d);var p1e=/^[0-9 \-.]+$/;if(elem.value.match(p1e)){return true;}else{return false;}}
function isnumerictel(p1d){elem=document.getElementById(p1d);var p1e=/^[0-9 \-./]+$/;if(elem.value.match(p1e)){return true;}else{return false;}}
function containsnubmer(str){var str1=document.getElementById(str).value;var ret1=true;for(var i2=0;i2<str1.length;i2++){if(!(str1.charAt(i2)>=0&&str1.charAt(i2)<=9&&str1.charAt(i2)!=" ")){ret1=false;}}
return ret1;}
function isstring(p1f){var p20=/^[a-zA-ZÀ-ÿ. \-]+$/;if(p1f.value.match(p20)){return true;}else{return false;}}
function trim(str,p21){return ltrim(rtrim(str,p21),p21);}
function ltrim(str,p22){p22=p22||"\\s";return str.replace(new RegExp("^["+p22+"]+","g"),"");}
function rtrim(str,p23){p23=p23||"\\s";return str.replace(new RegExp("["+p23+"]+$","g"),"");}
function multichar(p24){var p25=document.getElementById(p24).value;var p24=p25.length;var p26=1;var p27="";var p28="";var p29="";for(i1=0;i1<p25.length;i1++){p28=p25.charAt(i1);if(p29==p28&&p29!=" "&&p29!="0"&&p29!="1"&&p29!="2"&&p29!="3"&&p29!="4"&&p29!="5"&&p29!="6"&&p29!="7"&&p29!="8"&&p29!="9"){p27=p27+p28;p26++;}else{if(p26>=3){return false;}
p27=p28;p26=1;}
if(p26>=3){return false;}
p29=p28;}
return true;}
function echeck(str){var at="@"
var dot="."
var lat=str.indexOf(at)
var lstr=str.length
var ldot=str.indexOf(dot)
if(str.indexOf(at)==-1){return"Invalid Email ID1";}
if(str.indexOf(at)==-1||str.indexOf(at)==0||str.indexOf(at)==lstr){return"Invalid Email ID2";}
if(str.indexOf(dot)==-1||str.indexOf(dot)==0||str.indexOf(dot)==lstr){return"Invalid Email ID3"}
if(str.indexOf(at,(lat+1))!=-1){return"Invalid Email ID4"}
if(str.substring(lat-1,lat)==dot||str.substring(lat+1,lat+2)==dot){return"Invalid Email ID5"}
if(str.indexOf(dot,(lat+2))==-1){return"Invalid Email ID6"}
if(str.indexOf(" ")!=-1){return"Invalid Email ID7"}
return true}