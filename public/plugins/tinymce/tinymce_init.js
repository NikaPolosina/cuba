tinymce.init({
    selector: "textarea",theme: "modern",width: 750,height: 200,
    language: 'ru',
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor " +
        "responsivefilemanager" +
        " code"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
    image_advtab: true ,

    external_filemanager_path:"/plugins/responsive_filemanager/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/plugins/responsive_filemanager/filemanager/plugin.min.js"}
});