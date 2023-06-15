var cores = `
$cor_primaria:    #0043AF;
$cor_primaria2:  #0A0A0A;
$cor_secundaria:  #001429;
$cor_secundaria2: #0B59AB;
$cor_secundaria3: #EFF7FF;
$cor_secundaria4: #F24444;
$cor_secundaria5: #00762E;
$cor_neutra:      #FAFAFA;
$cor_neutra2:     #F1F1F1;
$cor_neutra3:     #E7E5E5;
$cor_neutra4:     #C8C8C8;
$cor_neutra5:     #ACACAC;
$cor_neutra6:     #828282;
$cor_neutra7:     #474747;
$cor_neutra8:     #242424;
`;
cores = cores.replaceAll('$','');
cores = cores.replaceAll('\n','');
cores = cores.replaceAll('#','');
cores = cores.replaceAll(':','');
var arrayFinal = [];
var arrayCores = cores.split(';')
arrayCores = arrayCores.filter((str) => str !== '');
arrayCores.forEach(function(el){
    var newEl = el.split(' ');
    newEl = newEl.filter((str) => str !== '');
    newEl.forEach(function(string){
        string = `"` + string + `"`;
        arrayFinal.unshift(string);
    })
})
arrayString = arrayFinal.toString();
textColorMap = ',textcolor_map: ["FFFFFF","branco","000000","preto",' + arrayString + ']';
console.log(textColorMap);