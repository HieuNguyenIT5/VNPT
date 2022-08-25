tinymce.init({
  selector: "textarea#products-describe",
  menubar: "false",
});
tinymce.init({
  selector: "textarea#products-detail_des",
  height: 600,
  width: "",
  plugins: [
    "",
    "autolink",
    "link",
    "image",
    "lists",
    "charmap",
    "preview",
    "anchor",
    "pagebreak",
    "searchreplace",
    "wordcount",
    "visualblocks",
    "code",
    "fullscreen",
    "insertdatetime",
    "media",
    "table",
    "emoticons",
    "template",
    "help",
    "responsivefilemanager",
  ],
  toolbar1: "undo redo | bold italic underline | advlist | charmap | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
  toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | table  | print preview code",
  image_advtab: true,

  external_filemanager_path: "http://localhost/VNPT/YiiDemo/file/",
  filemanager_title: "Responsive Filemanager",
  external_plugins: {"filemanager": "http://localhost/VNPT/YiiDemo/file/plugin.min.js"}
});
