// Editeur WYSIWYG pour la partie administration
tinymce.init({
  selector: '#mytextarea',
  theme: 'modern',
  language: 'fr_FR',
  // width: 600,
  height: 300,
  plugins: [
              'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
              'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
              'save table contextmenu directionality emoticons template paste textcolor'
          ],
  content_css: 'css/content.css',
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'  
});