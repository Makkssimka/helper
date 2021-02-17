$(document).ready(function () {

    let filesArray = [];

   $("#select-file").click(function (e) {
       e.preventDefault();
       $('#files').click();
   });

   $("#files").change(function () {
       let files = this.files;
       filesArray = this.files;
       let list = $(".images-files-list");
       let prefix = $('#image-prefix').val();

       $('.image-desc').remove();

       for (let i = 0; i < files.length; i++) {
           let imageName = files[i].name;
           let imageSize = (files[i].size/8/1000).toFixed(2);
           let newName = prefix ? prefix+'-'+imageName : imageName;
           let item = `<div class="image-item image-desc uk-flex">
                    <div class="images-field images-name">${ imageName }</div>
                    <div class="images-field images-size">${ imageSize } Kb</div>
                    <div class="images-field images-new-name">${ newName }</div>
                </div>`;
           list.append(item);
       }
   });

   $('#image-prefix').on('input', function () {
       let prefix = $(this).val();
       let newNameList = $('.images-new-name');

       newNameList.each(function (index, item) {
           let oldName = filesArray[index].name;
           let newName = prefix.trim() ? prefix+'-'+oldName : oldName;
           $(item).text(newName);
       })
   });

   $('#download_images').click(function () {
       document.location.href = "/images-create";
   });

});