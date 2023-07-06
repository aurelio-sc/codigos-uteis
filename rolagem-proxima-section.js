//el-bloco-cta-rolagem
$('.el-bloco-cta-rolagem').each(function() {
  const sections = $('section');
  const id = $(this).attr('id');
  const link = $(this).find('.direita')
  function findNextSectionId(id,arrayOfSections){
    var nextSectionId = id;
    var i = 0;
    $(arrayOfSections).each(function(){
      const thisId = $(this).attr('id');      
      if (thisId == id) {
        if ($(arrayOfSections)[i+1]) {
          const nextSection = ($(arrayOfSections)[i+1]);
          nextSectionId = $(nextSection).attr('id');
        }
        return;
      }
      i++;      
    })
    return '#' + nextSectionId;
  }  
  $(link).attr('href',findNextSectionId(id,sections));
})
