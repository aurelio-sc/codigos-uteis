const blocosDeOrcamento = ['el-formulario-orcamento', 'el-formulario-orcamento-2', 'el-formulario-orcamento-3', 'el-formulario-orcamento-contatos']; //Todos os blocos de orçamento.
$.each(blocosDeOrcamento,function(index, value){ //para cada bloco de orçamento no array,...
  let bloco =$(document).find('.'+value);	//... procura na página por esse bloco.
  if (bloco.length != 0) { //se achar,...
    let rolagem = '#'+bloco.attr('id'); //... pega o id do bloco (com # anted do id) e...
    $('.el-texto-slider .container .wrapper .texto .botao').attr('href',rolagem); //... coloca no href do botão.
  }
})